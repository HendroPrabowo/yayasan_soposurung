<?php

namespace backend\controllers;

use app\models\Angkatan;
use app\models\KelasMataPelajaran;
use app\models\Siswa;
use app\models\TahunAjaranKelas;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\KelasSiswa;
use app\models\search\KelasSiswaSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * KelasSiswaController implements the CRUD actions for KelasSiswa model.
 */
class KelasSiswaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'assign-siswa', 'get-siswa', 'view-siswa', 'hapus-siswa'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'assign-siswa', 'get-siswa', 'view-siswa', 'hapus-siswa'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'hapus-siswa' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all KelasSiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('supervisor')) {
            $searchModel = new KelasSiswaSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $tahun_ajaran_semester_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();

            if($tahun_ajaran_semester_aktif == null){
                $dataProvider = null;
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'tahun_ajaran_semester_aktif' => $tahun_ajaran_semester_aktif,
                ]);
            }
            else{
                $dataProvider = new ActiveDataProvider([
                    'query' => TahunAjaranKelas::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_semester_aktif->id])->orderBy('id ASC'),
                ]);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'tahun_ajaran_semester_aktif' => $tahun_ajaran_semester_aktif,
                ]);
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Displays a single KelasSiswa model.
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
     * Creates a new KelasSiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new KelasSiswa();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing KelasSiswa model.
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
     * Deletes an existing KelasSiswa model.
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
     * Finds the KelasSiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KelasSiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KelasSiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * Fungsi untuk mengassign siswa ke kelas
     */
    public function actionAssignSiswa($id){
        if(Yii::$app->user->can('admin')) {
            $model = new KelasSiswa();
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);

            if(Yii::$app->request->post()){
                $request = Yii::$app->request->post();

                $i=0;
                foreach ($request as $value){
                    if($i !=  0){
                        // Cari siswa yang di assign di kelas tersebut
                        $siswa = KelasSiswa::find()->where(['nisn' => $value, 'thn_ajaran_kelas_id' => $id])->one();

                        $siswa_sebenarnya = Siswa::findOne($value);
                        $siswa_sebenarnya->save();

                        if($siswa == null){
                            $kelas_siswa = new KelasSiswa();
                            $kelas_siswa->nisn = $value;
                            $kelas_siswa->thn_ajaran_kelas_id = $id;
                            $kelas_siswa->save();
                        }
                    }
                    $i++;
                }

                return $this->redirect(['kelas-siswa/view-siswa?id='.$id]);
            }

            $kelas_mata_pelajaran = KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->all();

            if($kelas_mata_pelajaran == null){
                return $this->render('tambah-mata-pelajaran', [
                    'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                ]);
            }

            $siswa = Siswa::find()->all();
            $angkatan = Angkatan::find()->all();
            return  $this->render('create', [
                'siswa' => $siswa,
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                'model' => $model,
                'angkatan' => $angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    // Ambil siswa dengan jquery
    public function actionGetSiswa($id){
        // Ambil semua siswa yang ada sudah di assign ke kelas
        $tahun_ajaran_semester = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
        // Ambil semua kelas yang ada
        $semua_tahun_ajaran_kelas = $tahun_ajaran_semester->tahunAjaranKelas;
        // Ambil semua siswa yang ada di semua kelas
        $siswa_sudah_memiliki_kelas = array();
        foreach ($semua_tahun_ajaran_kelas as $value){
            $kelas_siswa = $value->kelasSiswa;
            foreach ($kelas_siswa as $value1){
                $siswa_sudah_memiliki_kelas[] = $value1->nisn;
            }
        }


        // Ambil semua siswa yang terpilih per angkatan
        $angkatan_id = Yii::$app->request->post('angkatan_id');
        $siswa_per_angkatan = Siswa::find()->where(['angkatan_id' => $angkatan_id])->all();
        // Masukkan semua nisn siswa yang sudah diambil perangkatan tadi
        $nisn_semua_siswa_per_angkatan = array();
        foreach ($siswa_per_angkatan as $value){
            $nisn_semua_siswa_per_angkatan[] = $value->nisn;
        }

        // Mencari siswa yang belum memiliki kelas
        $penampung = array();
        foreach ($nisn_semua_siswa_per_angkatan as $value){
            if(!in_array($value, $siswa_sudah_memiliki_kelas)){
                $penampung[] = $value;
            }
        }

        // Ambil model siswa yang belum memiliki kelas
        $siswa_belum_memiliki_kelas = array();
        foreach ($penampung as $value){
            $siswa_belum_memiliki_kelas[] = Siswa::findOne($value);
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'siswa' => $siswa_belum_memiliki_kelas,
        ];
    }

    public function actionViewSiswa($id){
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);
            $kelas_siswa = KelasSiswa::find()->where(['thn_ajaran_kelas_id' => $tahun_ajaran_kelas->id])->all();

            return $this->render('view-siswa', [
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                'kelas_siswa' => $kelas_siswa,
            ]);

        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionHapusSiswa($id, $id_kelas_siswa){
        $kelas_siswa = KelasSiswa::findOne($id);

        $kelas_siswa->delete();

        return $this->actionViewSiswa($id_kelas_siswa);
    }
}
