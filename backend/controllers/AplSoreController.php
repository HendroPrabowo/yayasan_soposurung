<?php

namespace backend\controllers;

use Yii;
use app\models\AplSore;
use app\models\search\AplSore as AplSoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\JurnalLaporanPiket;
use app\models\TahunAjaranSemester;
use app\models\TahunAjaranKelas;

/**
 * AplSoreController implements the CRUD actions for AplSore model.
 */
class AplSoreController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'create-apel-hari-ini', 'index-apel'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'create-apel-hari-ini', 'index-apel'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all AplSore models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $dataProvider = $dataProvider = new ActiveDataProvider([
                'query' => JurnalLaporanPiket::find()->orderBy('tanggal DESC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Displays a single AplSore model.
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
     * Creates a new AplSore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $apel_sore = AplSore::find()->where(['jurnal_laporan_id' => $id])->all();
            if(count($apel_sore) != 0){
                Yii::$app->session->setFlash('error', 'Apel Sudah Dibuat');
                return $this->actionIndexApel($id);
            }

            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
            $tahun_ajaran_kelas = TahunAjaranKelas::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id])->all();

            $i = 0;
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                foreach ($tahun_ajaran_kelas as $value){
                    $model = new AplSore();
                    $model->tahun_ajaran_kelas_id = $value->id;
                    $model->jumlah = $request['jumlah_siswa_kelas_'.$value->id];
                    $model->hadir = $request['hadir_siswa_kelas_'.$value->id];
                    $model->tidak_hadir = $request['tidak_hadir_siswa_kelas_'.$value->id];
                    $model->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswa_kelas_'.$value->id];
                    $model->jurnal_laporan_id = $id;
                    $model->save();
                }

                return $this->actionIndexApel($id);
            }

            return $this->render('create', [
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing AplSore model.
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
     * Deletes an existing AplSore model.
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
     * Finds the AplSore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AplSore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AplSore::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCreateApelHariIni(){
        if(Yii::$app->user->can('admin')) {
            // Pengecekan waktu sekarang kalo sudah dibuat
            $jurnal_laporan_piket = JurnalLaporanPiket::find()->all();

            date_default_timezone_set('Asia/Jakarta');

            $tanggal_sekarang = date('d');

            foreach ($jurnal_laporan_piket as $item){
                $tanggal = $item->tanggal;
                $tanggal_di_database = date("d", strtotime($tanggal));

                // Jika sudah pernah dibuat
                if($tanggal_sekarang == $tanggal_di_database){
                    date_default_timezone_set('UTC');
                    Yii::$app->session->setFlash('error', "Apel Untuk Hari Ini Sudah Dibuat. Silahkan Cek List Apel Dibawah");
                    return $this->actionIndex();
                }
            }

            $model = new JurnalLaporanPiket();
            $model->tanggal = date("Y-m-d");
            $model->user_id = Yii::$app->user->id;
            $model->wakil_piket = "testing";
            $model->save();
            date_default_timezone_set('UTC');

            Yii::$app->session->setFlash('success', "Apel Makan Pagi Untuk Hari Ini Telah Dibuat");
            return $this->actionIndex();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionIndexApel($id){
        if(Yii::$app->user->can('admin')) {
            $jurnal_laporan_piket = JurnalLaporanPiket::findOne($id);
            $apel_sore = AplSore::find()->where(['jurnal_laporan_id' => $id])->all();

            $dataProvider = new ActiveDataProvider([
                'query' => AplSore::find()->where(['jurnal_laporan_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index-apel', [
                'dataProvider' => $dataProvider,
                'jurnal_laporan_piket' => $jurnal_laporan_piket,
                'apel_sore' => $apel_sore
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
