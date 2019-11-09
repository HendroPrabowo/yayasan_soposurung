<?php

namespace backend\controllers;

use app\models\TahunAjaranSemester;
use app\models\User;
use Yii;
use app\models\Kesehatan;
use app\models\search\KesehatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Siswa;
use yii\data\ActiveDataProvider;

/**
 * KesehatanController implements the CRUD actions for Kesehatan model.
 */
class KesehatanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kesehatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('perawat') || Yii::$app->user->can('supervisor')) {
            $searchModel = new KesehatanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if (Yii::$app->user->can('siswa')){
            $user = User::find()->where(['id' => Yii::$app->user->id])->one();

            $dataProvider = new ActiveDataProvider([
                'query' => Kesehatan::find()->where(['siswa_id' => $user->username])->orderBy('tanggal DESC'),
            ]);

            return $this->render('index-by-siswa', [
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Displays a single Kesehatan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('perawat')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new Kesehatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('perawat')) {
            $model = new Kesehatan();

            if ($model->load(Yii::$app->request->post())) {
                $user = User::findOne(Yii::$app->user->getId());
                if($user->role == 'admin'){
                    $model->created_by = 'admin';
                }else{
                    $user = User::findOne(Yii::$app->user->id);
                    $model->created_by = $user->username;
                }
                $tahun_ajaran_semester_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
                $model->tahun_ajaran_semester_id = $tahun_ajaran_semester_aktif->id;

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }

            $siswa = Siswa::find()->all();
            return $this->render('create', [
                'model' => $model,
                'siswa' => $siswa,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Updates an existing Kesehatan model.
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

            $siswa = Siswa::find()->all();
            return $this->render('update', [
                'model' => $model,
                'siswa' => $siswa
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing Kesehatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('perawat')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Finds the Kesehatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kesehatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kesehatan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
