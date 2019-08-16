<?php

namespace backend\controllers;

use app\models\KelasMataPelajaran;
use app\models\KelasSiswa;
use app\models\Penilaian;
use Yii;
use app\models\KomponenNilai;
use app\models\search\KomponenNilai as KomponenNilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * KomponenNilaiController implements the CRUD actions for KomponenNilai model.
 */
class KomponenNilaiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
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
     * Lists all KomponenNilai models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);
            $komponen_nilai = KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id])->all();

            // Cek apakah siswa sudah di assign ke kelas tersebut
            $jumlah_siswa = $kelas_mata_pelajaran->tahunAjaranKelas->getJumlahSiswa();

            $dataProvider = new ActiveDataProvider([
                'query' => KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
                'komponen_nilai' => $komponen_nilai,
                'dataProvider' => $dataProvider,
                'id' => $id,
                'jumlah_siswa' => $jumlah_siswa
            ]);
        }else {
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Displays a single KomponenNilai model.
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
     * Creates a new KomponenNilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $model = new KomponenNilai();

            // Cek jumlah siswa di kelas yang ingin ditambahkan komponen nilainya
            $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);
            $jumlah_siswa = $kelas_mata_pelajaran->tahunAjaranKelas->getJumlahSiswa();

            if($jumlah_siswa == 0){
                return $this->actionIndex($id);
            }

            if ($model->load(Yii::$app->request->post())) {
                // Ambil semua siswa yang akan dibuat komponen nilainya
                $id_tahun_ajaran_kelas = $kelas_mata_pelajaran->tahunAjaranKelas->id;
                $siswa = KelasSiswa::find()->where(['thn_ajaran_kelas_id' => $id_tahun_ajaran_kelas])->all();

                $model->kelas_mata_pelajaran_id = $id;

                if($model->save()){
                    foreach ($siswa as $value){
                        $penilaian = new Penilaian();
                        $penilaian->kelas_siswa_id = $value->id;
                        $penilaian->komponen_nilai_id = $model->id;
                        $penilaian->nilai = 0;
                        $penilaian->save();
                    }
                }

                return $this->redirect(['penilaian/view-komponen-nilai', 'id' => $id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing KomponenNilai model.
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
     * Deletes an existing KomponenNilai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')) {
            $komponen_nilai = KomponenNilai::findOne($id);
            $this->findModel($id)->delete();

            return $this->redirect(['index', 'id' => $komponen_nilai->kelas_mata_pelajaran_id]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Finds the KomponenNilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KomponenNilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KomponenNilai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
