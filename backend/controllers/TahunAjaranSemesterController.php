<?php

namespace backend\controllers;

use app\models\KelasR;
use app\models\Siswa;
use app\models\SiswaAssign;
use app\models\TahunAjaranKelas;
use Yii;
use app\models\TahunAjaranSemester;
use app\models\search\TahunAjaranSemesterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TahunAjaranSemesterController implements the CRUD actions for TahunAjaranSemester model.
 */
class TahunAjaranSemesterController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'set-active', 'assign-kelas', 'ubah-assign-kelas', 'assign-siswa-ke-kelas'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'set-active', 'assign-kelas', 'ubah-assign-kelas', 'assign-siswa-ke-kelas'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all TahunAjaranSemester models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $searchModel = new TahunAjaranSemesterSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $tahun_ajaran_aktif = TahunAjaranSemester::findOne(['is_active' => 1]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Displays a single TahunAjaranSemester model.
     * @param integer $id
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
     * Creates a new TahunAjaranSemester model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new TahunAjaranSemester();

            if ($model->load(Yii::$app->request->post())) {
                $model_active = TahunAjaranSemester::findOne(['is_active' => 1]);
                if($model_active != null){
                    $model_active->is_active = 0;
                    $model_active->save();
                }

                // Untuk Semester Ganjil
                $model->semester = 'Ganjil';
                $model->is_active = 1;
                $model->save();

                // Untuk Semester Genap
                $model2 = new TahunAjaranSemester();
                $model2->tahun_ajaran = $model->tahun_ajaran;
                $model2->semester = 'Genap';
                $model->is_active = 0;
                $model2->save();

                return $this->actionIndex();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing TahunAjaranSemester model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Deletes an existing TahunAjaranSemester model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the TahunAjaranSemester model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TahunAjaranSemester the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TahunAjaranSemester::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Mengganti tahun ajaran
     */
    public function actionSetActive($id){
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_lama = TahunAjaranSemester::findOne(['is_active' => 1]);
            $tahun_ajaran_lama->is_active = 0;
            $tahun_ajaran_lama->save();

            $tahun_ajaran_baru = TahunAjaranSemester::findOne($id);
            $tahun_ajaran_baru->is_active = 1;
            $tahun_ajaran_baru->save();

            return $this->actionIndex();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Mengassign kelas ke tahun ajaran
     */
    public function actionAssignKelas($id){
        if(Yii::$app->user->can('admin')) {
            $model = new TahunAjaranKelas;
            $tahun_ajaran_aktif = TahunAjaranSemester::findOne($id);

            if(Yii::$app->request->post()){
                $request = Yii::$app->request->post();
                $i=0;
                $kelas_dipilih = array();
                foreach ($request as $value){
                    if($i > 0){
                        $kelas_dipilih[] = $value;
                    }
                    $i++;
                }

                $tahun_ajaran = TahunAjaranSemester::find()->where(['tahun_ajaran' => $tahun_ajaran_aktif->tahun_ajaran])->all();
                foreach ($tahun_ajaran as $value_tahun_ajaran){
                    foreach ($kelas_dipilih as $value_kelas){
                        if(($kelas = TahunAjaranKelas::findOne(['kelas_id' => $value_kelas, 'tahun_ajaran_semester_id' => $value_tahun_ajaran->id])) == null){
                            $tahun_ajaran_kelas = new TahunAjaranKelas;
                            $tahun_ajaran_kelas->tahun_ajaran_semester_id = $value_tahun_ajaran->id;
                            $tahun_ajaran_kelas->kelas_id = $value_kelas;
                            $tahun_ajaran_kelas->save();
                        }
                    }
                }

//                Menampilkan kelas yang dipilih
//                foreach ($kelas_dipilih as $value){
//                    echo $value.'<br>';
//                }

//                if($model->load(Yii::$app->request->post())){
//                    $tahun_ajaran = TahunAjaranSemester::find()->where(['tahun_ajaran' => $tahun_ajaran_aktif->tahun_ajaran])->all();
//                    foreach ($tahun_ajaran as $value_tahun_ajaran){
//                        foreach ($model->kelas_id as $value_kelas){
//                            $kelas_id = (int)$value_kelas;
//                            if(($kelas = TahunAjaranKelas::findOne(['kelas_id' => $kelas_id, 'tahun_ajaran_semester_id' => $value_tahun_ajaran->id])) == null){
//                                $tahun_ajaran_kelas = new TahunAjaranKelas;
//                                $tahun_ajaran_kelas->tahun_ajaran_semester_id = $value_tahun_ajaran->id;
//                                $tahun_ajaran_kelas->kelas_id = $kelas_id;
//                                $tahun_ajaran_kelas->save();
//                            }
//                        }
//                    }
//                }

//                die();
                return $this->actionIndex();
            }else{
                $kelas = KelasR::find()->all();
                return $this->render('_form_assign_kelas', [
                    'kelas' => $kelas,
                    'model' => $model,
                    'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
                ]);
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Mengubah kelas yang telah di assign ke tahun ajaran tertentu
    */
    public function actionUbahAssignKelas($id){
        if(Yii::$app->user->can('admin')) {
            $model = new TahunAjaranKelas;
            $tahun_ajaran_aktif = TahunAjaranSemester::findOne($id);

            if(Yii::$app->request->post()){
                if($model->load(Yii::$app->request->post())){
                    // Cari model untuk semester ganjil dan genapnya
                    $tahun_ajaran = TahunAjaranSemester::find()->where(['tahun_ajaran' => $tahun_ajaran_aktif->tahun_ajaran])->all();
                    foreach($tahun_ajaran as $value_tahun_ajaran){
                        // Hapus kelas lama yang ingin dihapus
                        // Kelas yang telah di assign ke semester
                        $kelas_all = TahunAjaranKelas::findAll(['tahun_ajaran_semester_id' => $value_tahun_ajaran->id]);
                        foreach ($kelas_all as $value){
                            if(!in_array($value->kelas_id, $model->kelas_id)){
                                $kelas_hapus = TahunAjaranKelas::findOne(['kelas_id' => $value->kelas_id, 'tahun_ajaran_semester_id' => $value_tahun_ajaran->id]);
                                $kelas_hapus->delete();
                            }
                        }

                        // Insert kelas baru yang ditambahkan
                        foreach ($model->kelas_id as $value){
                            $kelas_id = (int)$value;
                            if(($kelas = TahunAjaranKelas::findOne(['kelas_id' => $kelas_id, 'tahun_ajaran_semester_id' => $value_tahun_ajaran->id])) == null){
                                $tahun_ajaran_kelas = new TahunAjaranKelas;
                                $tahun_ajaran_kelas->tahun_ajaran_semester_id = $value_tahun_ajaran->id;
                                $tahun_ajaran_kelas->kelas_id = $kelas_id;
                                $tahun_ajaran_kelas->save();
                            }
                        }
                    }
                }
                return $this->actionIndex();
            }else{
                $kelas = KelasR::find()->all();
                return $this->render('_form_assign_kelas', [
                    'kelas' => $kelas,
                    'model' => $model,
                    'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
                ]);
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Mengassign siswa ke kelas tertentu
     */
    public function actionAssignSiswaKeKelas(){
        if(Yii::$app->user->can('admin')) {
            if(Yii::$app->request->post()){
                $input = Yii::$app->request->post('SiswaAssign');
                var_dump($input);
                die();
            }else{
                $semua_siswa = Siswa::findAll(['kelas_id' => null]);
                return $this->render('_form_assign_siswa_ke_kelas', [
                    'semua_siswa' => $semua_siswa,
                    'model' => new SiswaAssign(),
                ]);
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
