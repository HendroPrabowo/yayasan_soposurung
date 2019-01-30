<?php

namespace backend\controllers;

use phpDocumentor\Reflection\Types\Integer;
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
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
            return $this->render('view', [
                'model' => $this->findModel($id),
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

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->nisn]);
            }

            return $this->render('create', [
                'model' => $model,
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

            return $this->render('update', [
                'model' => $model,
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
        if (($model = Siswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Import data siswa dari excel
     */
    public function actionImportExcel(){
        if(Yii::$app->user->can('admin')) {
            $model = new Siswa();
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
                $user_array = array();
                $siswa_array = array();
                set_time_limit(3600);
                foreach ($sheetdata as $value){
                    if($i > 1){
                        // Pembuatan akun baru
                        if(User::findOne(['username' => $value[3]]) == null){
                            $user_common = new \common\models\User();
                            $user_common->setPassword($value[3]);
                            $user_common->generateAuthKey();

                            $user = new User;
                            $user->username = $value[3];
                            $user->auth_key = $user_common->auth_key;
                            $user->password_hash = $user_common->password_hash;
                            $user->role = 'siswa';
                            $user->status = 10;
                            $user->save();
                        }

                        // Ambil data user
                        $user = User::findOne(['username' => $value[3]]);
                        $siswa = Siswa::findOne(['nisn' => $user->username]);

                        /**
                         * Simpan data ke array siswa jika data belum ada
                         * Untuk dimasukkan ke tabel siswa
                         */
                        if($siswa == null){
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
                                'user_id' => $user->id,
                            ];
                        }
                    }
                    $i++;
                }

                // Insert ke tabel siswa
                if($siswa_array != null){
                    $tableName ='siswa';
                    $columnNameArray = ['nisn', 'nama', 'kelahiran', 'jenis_kelamin', 'agama', 'status_dalam_keluarga', 'anak_ke', 'sekolah_asal', 'nama_ayah', 'nama_ibu', 'alamat_orang_tua', 'nomor_telepon_orang_tua', 'pekerjaan_ayah', 'pekerjaan_ibu', 'user_id'];
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
}
