<?php

namespace backend\controllers;

use Mpdf\Mpdf;
use Yii;
use app\models\User;
use app\models\LogMasukBarang;
use app\models\search\LogMasukBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * LogMasukBarangController implements the CRUD actions for LogMasukBarang model.
 */
class LogMasukBarangController extends Controller
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
     * Lists all LogMasukBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security') || Yii::$app->user->can('supervisor')) {
            $searchModel = new LogMasukBarangSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider = new ActiveDataProvider([
                'query' => LogMasukBarang::find()->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 20,
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
     * Displays a single LogMasukBarang model.
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
     * Creates a new LogMasukBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('security')) {
            $model = new LogMasukBarang();

            if ($model->load(Yii::$app->request->post())) {
                $user = User::findOne(Yii::$app->user->id);
                $model->created_by = $user->id;
                $model->save();

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
     * Updates an existing LogMasukBarang model.
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
     * Deletes an existing LogMasukBarang model.
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
     * Finds the LogMasukBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogMasukBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogMasukBarang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrintLaporan(){
        $tanggal = Yii::$app->request->post('tanggal');
        $tanggal_awal = Yii::$app->request->post('tanggal');
        $log_barang = array();

        for($i=0;$i<7;$i++){
            $log_masuk_barang = LogMasukBarang::find()->where(['tanggal' => $tanggal])->all();
            foreach ($log_masuk_barang as $value){
                $log_barang[] = $value;
            }
            $tanggal = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
        }

        $pdf = $this->renderPartial('view-pdf', [
            'tanggal_awal' => $tanggal_awal,
            'log_barang' => $log_barang,
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
