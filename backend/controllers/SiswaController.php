<?php

namespace backend\controllers;

use app\models\Angkatan;
use app\models\AuthAssignment;
use app\models\Kedisiplinan;
use app\models\KelasR;
use backend\models\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yii;
use app\models\Siswa;
use app\models\search\SiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\User;
use yii\data\ActiveDataProvider;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class SiswaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'import-excel', 'view-by-siswa', 'download-excel'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete',  'import-excel', 'view-by-siswa', 'download-excel'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Siswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $searchModel = new SiswaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $semua_angkatan = new ActiveDataProvider([
                'query' => Angkatan::find(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'semua_angkatan' => $semua_angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Displays a single Siswa model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin')) {
            $model = Siswa::findOne($id);

            $dataProvider = new ActiveDataProvider([
                'query' => Kedisiplinan::find()->where(['siswa_id' => $model->nisn])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('view', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new Siswa();

            if ($model->load(Yii::$app->request->post())) {
                // Create Akun untuk Siswa
                $user_common = new \common\models\User();
                $user_common->setPassword($model->nisn);
                $user_common->generateAuthKey();

                $user = new User();
                $user->username = $model->nisn;
                $user->role = 'siswa';
                $user->password_hash = $user_common->password_hash;
                $user->auth_key = $user_common->auth_key;
                $user->save();

                $model->user_id = $user->id;
                $model->save();

                $auth_assignment = new AuthAssignment();
                $auth_assignment->item_name = $user->role;
                $auth_assignment->user_id = $user->id;
                $auth_assignment->save();

                Yii::$app->session->addFlash('success', 'Akun '.$user->username.' berhasil dibuat');
                return $this->redirect(['view', 'id' => $model->nisn]);
            }

            $kelas = KelasR::find()->all();
            $angkatan = Angkatan::find()->all();
            return $this->render('create', [
                'model' => $model,
                'kelas' => $kelas,
                'angkatan' => $angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->nisn]);
            }

            $kelas = KelasR::find()->all();
            $angkatan = Angkatan::find()->all();
            return $this->render('update', [
                'model' => $model,
                'kelas' => $kelas,
                'angkatan' => $angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing Siswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Finds the Siswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Siswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Siswa::findOne($id)) != null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Import data siswa dari excel
     */
    public function actionImportExcel(){
        if(Yii::$app->user->can('admin')) {
            $model = new Excel();
            if(Yii::$app->request->post()){
                $model->excel = UploadedFile::getInstance($model, 'excel');
                $path = 'uploads/excel';
                $filePath = $path . rand(1, 100) . '-' . str_replace('', '-', $model->excel->name);
                $model->excel->saveAs($filePath);

                // Membaca file
                $spreadsheet = IOFactory::load($filePath);
                $sheetdata = $spreadsheet->getActiveSheet()->toArray();

                // Buat user siswa
                $i = 0;
                $siswa_array = array();
                set_time_limit(3600);
                foreach ($sheetdata as $value){
                    if($i > 1){
                        // Pembuatan akun baru
                        if(User::findOne(['username' => $value[3]]) == null){
                            $user_common = new \common\models\User();
                            $user_common->setPassword($value[3]);
                            $user_common->generateAuthKey();

                            if($value[3] != null){
                                $user = new User;
                                $user->username = $value[3];
                                $user->auth_key = $user_common->auth_key;
                                $user->password_hash = $user_common->password_hash;
                                $user->role = 'siswa';
                                $user->status = 10;
                                $user->save();

                                // Pembuatan validasi siswa
                                $authAssignment = new AuthAssignment;
                                $authAssignment->item_name = 'siswa';
                                $authAssignment->user_id = $user->id;
                                $authAssignment->save();

                                // Array siswa
                                $siswa_array[] = [
                                    'nisn' => $value[3],
                                    'nama' => $value[2],
                                    'kelahiran' => $value[4],
                                    'jenis_kelamin' => $value[5],
                                    'agama' => $value[6],
                                    'status_dalam_keluarga' => $value[7],
                                    'anak_ke' => $value[8],
                                    'sekolah_asal' => $value[9],
                                    'nama_ayah' => $value[10],
                                    'nama_ibu' => $value[11],
                                    'alamat_orang_tua' => $value[12],
                                    'nomor_telepon_orang_tua' => $value[13],
                                    'pekerjaan_ayah' => $value[14],
                                    'pekerjaan_ibu' => $value[15],
                                    'angkatan_id' => $value[16],
                                    'user_id' => $user->id,
                                ];
                            }
                        }
                    }
                    $i++;
                }

                // Insert ke tabel siswa
                if($siswa_array != null){
                    $tableName ='siswa';
                    $columnNameArray = ['nisn', 'nama', 'kelahiran', 'jenis_kelamin', 'agama', 'status_dalam_keluarga', 'anak_ke', 'sekolah_asal', 'nama_ayah', 'nama_ibu', 'alamat_orang_tua', 'nomor_telepon_orang_tua', 'pekerjaan_ayah', 'pekerjaan_ibu', 'angkatan_id', 'user_id'];
                    Yii::$app->db->createCommand()->batchInsert($tableName, $columnNameArray, $siswa_array)->execute();
                }

                Yii::$app->session->setFlash('success', 'Import data excel berhasil');
                return $this->actionIndex();
            }

            return $this->render('_form_import_excel', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Fungsi untuk melihat data diri siswa
     */
    public function actionViewBySiswa(){
        if(Yii::$app->user->can('siswa')) {
            $user = User::findOne(Yii::$app->user->id);

            return $this->render('view_by_siswa', [
                'model' => $this->findModel(['nisn' => $user->username]),
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Fungsi download template excel data siswa
     */
    public function actionDownloadExcel(){
        if(Yii::$app->user->can('admin')){
            $excel = Yii::$app->basePath.'/web/template/TemplateDataSiswa.xlsx';

            if (file_exists($excel)) {
                return Yii::$app->response->sendFile($excel);
            }
        }
    }
}
