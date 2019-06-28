<?php

namespace backend\controllers;

use app\models\KelasMataPelajaran;
use app\models\KomponenNilai;
use app\models\TahunAjaranKelas;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\Penilaian;
use app\models\search\Penilaian as PenilaianSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PenilaianController implements the CRUD actions for Penilaian model.
 */
class PenilaianController extends Controller
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
                'only' => ['index', 'view-mata-pelajaran', 'view-komponen-nilai', 'view-penilaian', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view-mata-pelajaran', 'view-komponen-nilai', 'view-penilaian', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Penilaian models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            // Cek tahun ajaran aktif untuk mengambil kelas yang ada di tahun ajaran tersebut
            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();

            if($tahun_ajaran_aktif == null){
                return $this->redirect(['tahun-ajaran-semester/index']);
            }

            $dataProvider = new ActiveDataProvider([
                'query' => TahunAjaranKelas::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id]),
            ]);

            return $this->render('index-kelas', [
                'dataProvider' => $dataProvider,
                'tahun_ajaran' => $tahun_ajaran_aktif,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new Penilaian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new Penilaian();

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
     * Updates an existing Penilaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $komponen_nilai)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view-penilaian', 'id' => $komponen_nilai]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing Penilaian model.
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
     * Finds the Penilaian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penilaian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penilaian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewMataPelajaran($id)
    {
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);
            $kelas_mata_pelajaran = KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->all();

            $dataProvider = new ActiveDataProvider([
                'query' => KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index-mata-pelajaran', [
                'dataProvider' => $dataProvider,
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    public function actionViewKomponenNilai($id){
        $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id]),
        ]);

        // Kodingan untuk tabel baru
        $kelas_siswa = $kelas_mata_pelajaran->tahunAjaranKelas->kelasSiswa;
        $komponen_nilai = KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id])->all();
        $penilaian = Penilaian::find()->all();

        return $this->render('index-komponen-nilai', [
            'dataProvider' => $dataProvider,
            'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
            'kelas_siswa' => $kelas_siswa,
            'komponen_nilai' => $komponen_nilai,
            'penilaian' => $penilaian,
        ]);
    }

    public function actionViewPenilaian($id){
        $komponen_nilai = KomponenNilai::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Penilaian::find()->where(['komponen_nilai_id' => $id]),
        ]);

        return $this->render('index-nilai', [
            'dataProvider' => $dataProvider,
            'komponen_nilai' => $komponen_nilai
        ]);
    }
}
