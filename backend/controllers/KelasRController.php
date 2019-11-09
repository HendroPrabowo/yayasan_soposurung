<?php

namespace backend\controllers;

use Yii;
use app\models\KelasR;
use app\models\search\KelasRSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * KelasRController implements the CRUD actions for KelasR model.
 */
class KelasRController extends Controller
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
     * Lists all KelasR models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('supervisor')) {
            $searchModel = new KelasRSearch();
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
     * Displays a single KelasR model.
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
     * Creates a new KelasR model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new KelasR();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['kelas-r/index']);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Updates an existing KelasR model.
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
                return $this->redirect(['kelas-r/index']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Deletes an existing KelasR model.
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
     * Finds the KelasR model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KelasR the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KelasR::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
