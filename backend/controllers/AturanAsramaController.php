<?php

namespace backend\controllers;

use backend\models\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use Yii;
use app\models\AturanAsrama;
use app\models\search\AturanAsramaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AturanAsramaController implements the CRUD actions for AturanAsrama model.
 */
class AturanAsramaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'import-excel'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'import-excel'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AturanAsrama models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $searchModel = new AturanAsramaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Displays a single AturanAsrama model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new AturanAsrama model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $model = new AturanAsrama();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else {
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing AturanAsrama model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else {
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Deletes an existing AturanAsrama model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Finds the AturanAsrama model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AturanAsrama the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AturanAsrama::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImportExcel()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $model = new Excel();

            if(Yii::$app->request->post()){
                $model->excel = UploadedFile::getInstance($model, 'excel');
                $path = 'uploads/excel';
                $filePath = $path . rand(1, 100) . '-' . str_replace('', '-', $model->excel->name);
                $model->excel->saveAs($filePath);

                // membaca file
                $spreadsheet = IOFactory::load($filePath);
                $sheetdata = $spreadsheet->getActiveSheet()->toArray();

                $i = 0;
                $peraturan_array = array();
                set_time_limit(7200);
                foreach ($sheetdata as $value) {
                    if($i > 0){
                        $aturan = AturanAsrama::find()->where(['jenis_pelanggaran' => $value[1]])->one();
                        // kalo peraturannya belum ada maka dibuat baru
                        if($aturan == null){
                            $peraturan_array[] = [
                                'jenis_pelanggaran' => $value[1],
                                'point' => $value[2]
                            ];
                        }// kalo udah ada update yang lama
                        else{
                            $aturan->jenis_pelanggaran = $value[1];
                            $aturan->point = $value[2];
                            $aturan->save();
                        }
                    }
                    $i++;
                }

                if($peraturan_array != null){
                    $tableName = 'aturan_asrama';
                    $columnNameArray = ['jenis_pelanggaran', 'point'];
                    Yii::$app->db->createCommand()->batchInsert($tableName, $columnNameArray, $peraturan_array)->execute();
                }

                Yii::$app->session->setFlash('success', 'Import data excel berhasil');
                return $this->actionIndex();
            }

            return $this->render('_form_import_excel', [
                'model' => $model
            ]);

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionDownloadExcel(){
        $excel = Yii::$app->basePath.'/web/template/AturanAsrama.xlsx';

        if (file_exists($excel)) {
            return Yii::$app->response->sendFile($excel);
        }
    }
}
