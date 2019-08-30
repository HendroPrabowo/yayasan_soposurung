<?php

namespace backend\controllers;

use Yii;
use app\models\LogTamu;
use app\models\search\LogTamuSearch;
use yii\debug\models\search\Log;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Mpdf\Mpdf;
use yii\data\ActiveDataProvider;

/**
 * LogTamuController implements the CRUD actions for LogTamu model.
 */
class LogTamuController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'print-laporan', 'index-kepala-asrama'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'print-laporan', 'index-kepala-asrama'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all LogTamu models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
            $searchModel = new LogTamuSearch();

            $dataProvider = new ActiveDataProvider([
                'query' => LogTamu::find()->orderBy('id DESC'),
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
     * Displays a single LogTamu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Creates a new LogTamu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
            $model = new LogTamu();

            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = Yii::$app->user->id;
                date_default_timezone_set('Asia/Jakarta');
                $model->waktu_masuk = date("Y-m-d H:i:s");
                $model->save();
                date_default_timezone_set('UTC');
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
     * Updates an existing LogTamu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
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
     * Deletes an existing LogTamu model.
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
     * Finds the LogTamu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogTamu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogTamu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionKeluar($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
            $log_tamu = LogTamu::findOne($id);
            date_default_timezone_set('Asia/Jakarta');
            $log_tamu->waktu_keluar = date("Y-m-d H:i:s");

            $log_tamu->save();

            date_default_timezone_set('UTC');

            return $this->actionIndex();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionPrintLaporan(){
        $tanggal = Yii::$app->request->post('tanggal');
        $tanggal_awal = Yii::$app->request->post('tanggal');
        $log_tamu = array();
        $semua_log_tamu = LogTamu::find()->all();
        $date_all = array();
        for($i=0;$i<7;$i++){
            $date_all[] = $tanggal;
            $tanggal = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
        }

        foreach ($semua_log_tamu as $value){
            $waktu = date('Y-m-d', strtotime($value->waktu_masuk));
            if(in_array($waktu, $date_all)){
                $log_tamu[] = $value;
            }
        }

        $pdf = $this->renderPartial('view-pdf', [
            'tanggal_awal' => $tanggal_awal,
            'log_tamu' => $log_tamu,
        ]);

        $mpdf = new Mpdf([
            'format' => 'A4',
            'orientation' => 'L',
        ]);

        $mpdf->WriteHTML($pdf);
        $mpdf->Output();
    }

    public function actionIndexKepalaAsrama(){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('kepala asrama')) {

            return $this->render('index-kepala-asrama');
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
