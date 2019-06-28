<?php

namespace backend\controllers;

use app\models\JurnalLaporanPiket;
use Yii;
use app\models\SwSenamAplPgi;
use app\models\search\SwSenamAplPgiSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SiswaApelPagiController implements the CRUD actions for SiswaApelPagi model.
 */
class SwSenamAplPgiController extends Controller
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
     * Lists all SiswaApelPagi models.
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
     * Displays a single SiswaApelPagi model.
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
     * Creates a new SiswaApelPagi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $jurnal_laporan_piket = JurnalLaporanPiket::findOne($id);

            $apel_pagi = SwSenamAplPgi::find()->where(['jurnal_laporan_id' => $id])->all();
            if(count($apel_pagi) != 0){
                Yii::$app->session->setFlash('error', 'Apel Sudah Dibuat');
                return $this->actionIndexApel($id);
            }

            if(Yii::$app->request->post()){
                $request = Yii::$app->request->post();
                $siswa_kelas_x = new SwSenamAplPgi();
                $siswa_kelas_x->kelas = 'Siswa Kelas X';
                $siswa_kelas_x->jumlah = $request['jumlah_siswa_kelas_x'];
                $siswa_kelas_x->hadir = $request['hadir_siswa_kelas_x'];;
                $siswa_kelas_x->tidak_hadir = $request['tidak_hadir_siswa_kelas_x'];
                $siswa_kelas_x->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswa_kelas_x'];
                $siswa_kelas_x->jurnal_laporan_id = $id;
                $siswa_kelas_x->save();

                $siswa_kelas_xi = new SwSenamAplPgi();
                $siswa_kelas_xi->kelas = 'Siswa Kelas XI';
                $siswa_kelas_xi->jumlah = $request['jumlah_siswa_kelas_xi'];
                $siswa_kelas_xi->hadir = $request['hadir_siswa_kelas_xi'];;
                $siswa_kelas_xi->tidak_hadir = $request['tidak_hadir_siswa_kelas_xi'];
                $siswa_kelas_xi->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswa_kelas_xi'];
                $siswa_kelas_xi->jurnal_laporan_id = $id;
                $siswa_kelas_xi->save();

                $siswa_kelas_xii = new SwSenamAplPgi();
                $siswa_kelas_xii->kelas = 'Siswa Kelas XII';
                $siswa_kelas_xii->jumlah = $request['jumlah_siswa_kelas_xii'];
                $siswa_kelas_xii->hadir = $request['hadir_siswa_kelas_xii'];;
                $siswa_kelas_xii->tidak_hadir = $request['tidak_hadir_siswa_kelas_xii'];
                $siswa_kelas_xii->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswa_kelas_xii'];
                $siswa_kelas_xii->jurnal_laporan_id = $id;
                $siswa_kelas_xii->save();

                $siswi_kelas_x = new SwSenamAplPgi();
                $siswi_kelas_x->kelas = 'Siswi Kelas X';
                $siswi_kelas_x->jumlah = $request['jumlah_siswi_kelas_x'];
                $siswi_kelas_x->hadir = $request['hadir_siswi_kelas_x'];;
                $siswi_kelas_x->tidak_hadir = $request['tidak_hadir_siswi_kelas_x'];
                $siswi_kelas_x->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswi_kelas_x'];
                $siswi_kelas_x->jurnal_laporan_id = $id;
                $siswi_kelas_x->save();

                $siswi_kelas_xi = new SwSenamAplPgi();
                $siswi_kelas_xi->kelas = 'Siswi Kelas XI';
                $siswi_kelas_xi->jumlah = $request['jumlah_siswi_kelas_xi'];
                $siswi_kelas_xi->hadir = $request['hadir_siswi_kelas_xi'];;
                $siswi_kelas_xi->tidak_hadir = $request['tidak_hadir_siswi_kelas_xi'];
                $siswi_kelas_xi->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswi_kelas_xi'];
                $siswi_kelas_xi->jurnal_laporan_id = $id;
                $siswi_kelas_xi->save();

                $siswi_kelas_xii = new SwSenamAplPgi();
                $siswi_kelas_xii->kelas = 'Siswi Kelas XII';
                $siswi_kelas_xii->jumlah = $request['jumlah_siswi_kelas_xii'];
                $siswi_kelas_xii->hadir = $request['hadir_siswi_kelas_xii'];;
                $siswi_kelas_xii->tidak_hadir = $request['tidak_hadir_siswi_kelas_xii'];
                $siswi_kelas_xii->keterangan_tidak_hadir = $request['keterangan_tidak_hadir_siswi_kelas_xii'];
                $siswi_kelas_xii->jurnal_laporan_id = $id;
                $siswi_kelas_xii->save();

                return $this->actionIndexApel($id);
            }

            return $this->render('create', [
                'jurnal_laporan_piket' => $jurnal_laporan_piket,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing SiswaApelPagi model.
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
     * Deletes an existing SiswaApelPagi model.
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
     * Finds the SiswaApelPagi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SwSenamAplPgi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SwSenamAplPgi::findOne($id)) !== null) {
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
                    Yii::$app->session->setFlash('error', "Apel Pagi Untuk Hari Ini Sudah Dibuat. Silahkan Cek List Apel Dibawah");
                    return $this->actionIndex();
                }
            }

            $model = new JurnalLaporanPiket();
            $model->tanggal = date("Y-m-d");
            $model->user_id = Yii::$app->user->id;
            $model->wakil_piket = "testing";
            $model->save();
            date_default_timezone_set('UTC');

            Yii::$app->session->setFlash('success', "Apel Pagi Untuk Hari Ini Telah Dibuat");
            return $this->actionIndex();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionIndexApel($id){
        $jurnal_laporan_piket = JurnalLaporanPiket::findOne($id);
        $apel_pagi = SwSenamAplPgi::find()->where(['jurnal_laporan_id' => $id])->all();
//        $apel_pagi = SiswaApelPagi::find()->where(['jurnal_laporan_id' => $id])->all();

        $dataProvider = new ActiveDataProvider([
            'query' => SwSenamAplPgi::find()->where(['jurnal_laporan_id' => $id])->orderBy('id ASC'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index-apel', [
            'dataProvider' => $dataProvider,
            'jurnal_laporan_piket' => $jurnal_laporan_piket,
            'apel_pagi' => $apel_pagi
        ]);
    }
}
