<?php

namespace backend\controllers;

use Mpdf\Mpdf;
use Yii;
use app\models\JurnalLaporanPiket;
use app\models\search\JurnalLaporanPiket as JurnalLaporanPiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * JurnalLaporanPiketController implements the CRUD actions for JurnalLaporanPiket model.
 */
class JurnalLaporanPiketController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'print-laporan'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'print-laporan'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all JurnalLaporanPiket models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('piket')) {
            $searchModel = new JurnalLaporanPiketSearch();
            $dataProvider = new ActiveDataProvider([
                'query' => JurnalLaporanPiket::find()->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Displays a single JurnalLaporanPiket model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $senam_pagi = $model->swSenamAplPgi;
        $makan_pagi = $model->swAplMknPgi;
        $apel_pagi = $model->aplPgiKelas;
        $makan_siang = $model->aplMknSiang;
        $apel_sore = $model->aplSore;
        $makan_malam = $model->aplMknMalam;
        $apel_malam = $model->aplMalam;

        return $this->render('view', [
            'model' => $model,
            'senam_pagi' => $senam_pagi,
            'makan_pagi' => $makan_pagi,
            'apel_pagi' => $apel_pagi,
            'makan_siang' => $makan_siang,
            'apel_sore' => $apel_sore,
            'makan_malam' => $makan_malam,
            'apel_malam' => $apel_malam,
        ]);
    }

    /**
     * Creates a new JurnalLaporanPiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('piket')) {
            $model = new JurnalLaporanPiket();

            // Pengecekan waktu sekarang kalo sudah dibuat
            $jurnal_laporan_piket = JurnalLaporanPiket::find()->all();
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_sekarang = date("Y-m-d");

            foreach ($jurnal_laporan_piket as $item){
                $tanggal = $item->tanggal;
                $tanggal_di_database = $item->tanggal;

                // Jika sudah pernah dibuat
                if($tanggal_sekarang == $tanggal_di_database){
                    date_default_timezone_set('UTC');
                    Yii::$app->session->setFlash('error', "Apel Untuk Hari Ini Sudah Dibuat. Silahkan Cek List Apel Dibawah");
                    return $this->actionIndex();
                }
            }

            if (Yii::$app->request->post()) {
                $model->load(Yii::$app->request->post());
                $model->user_id = Yii::$app->user->id;
                $model->tanggal = date("Y-m-d");
                $model->save();

                date_default_timezone_set('UTC');

                return $this->redirect(['index']);
            }

            return $this->render('create', ['model' => $model]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing JurnalLaporanPiket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->actionIndex();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the JurnalLaporanPiket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JurnalLaporanPiket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JurnalLaporanPiket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrintLaporan($id){
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);
            $senam_pagi = $model->swSenamAplPgi;
            $makan_pagi = $model->swAplMknPgi;
            $apel_pagi = $model->aplPgiKelas;
            $makan_siang = $model->aplMknSiang;
            $apel_sore = $model->aplSore;
            $makan_malam = $model->aplMknMalam;
            $apel_malam = $model->aplMalam;

            $pdf = $this->renderPartial('view', [
                'model' => $model,
                'senam_pagi' => $senam_pagi,
                'makan_pagi' => $makan_pagi,
                'apel_pagi' => $apel_pagi,
                'makan_siang' => $makan_siang,
                'apel_sore' => $apel_sore,
                'makan_malam' => $makan_malam,
                'apel_malam' => $apel_malam,
            ]);

            $mpdf = new Mpdf([
                'format' => 'A4',
            ]);

            $mpdf->WriteHTML($pdf);
            $mpdf->Output();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
