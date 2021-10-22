<?php

namespace backend\controllers;

use Yii;
use app\models\AplMalam;
use app\models\search\AplMalamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\JurnalLaporanPiket;
use app\models\TahunAjaranSemester;
use app\models\TahunAjaranKelas;

/**
 * AplMalamController implements the CRUD actions for AplMalam model.
 */
class AplMalamController extends Controller
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
     * Lists all AplMalam models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('piket') || Yii::$app->user->can('supervisor')) {
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
     * Displays a single AplMalam model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AplMalam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('piket')) {
            $apel_malam = AplMalam::find()->where(['jurnal_laporan_id' => $id])->all();
            if(count($apel_malam) != 0){
                Yii::$app->session->setFlash('error', 'Apel Sudah Dibuat');
                return $this->actionIndexApel($id);
            }

            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
            if($tahun_ajaran_aktif == null) {
                return $this->redirect(['error/error', 'name' => "Belum ada tahun ajaran aktif", 'message' => 'Silahkan hubungi admin untuk menambah atau mengaktifkan tahun ajaran']);
            }
            $tahun_ajaran_kelas = TahunAjaranKelas::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id])->all();

            $i = 0;
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                foreach ($tahun_ajaran_kelas as $value){
                    $model = new AplMalam();
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
     * Updates an existing AplMalam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AplMalam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AplMalam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AplMalam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AplMalam::findOne($id)) !== null) {
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
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('piket') || Yii::$app->user->can('supervisor')) {
            $jurnal_laporan_piket = JurnalLaporanPiket::findOne($id);
            $apel_pagi_kelas = AplMalam::find()->where(['jurnal_laporan_id' => $id])->all();

            $dataProvider = new ActiveDataProvider([
                'query' => AplMalam::find()->where(['jurnal_laporan_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index-apel', [
                'dataProvider' => $dataProvider,
                'jurnal_laporan_piket' => $jurnal_laporan_piket,
                'apel_pagi_kelas' => $apel_pagi_kelas
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
