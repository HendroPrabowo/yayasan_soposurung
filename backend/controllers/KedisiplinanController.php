<?php

namespace backend\controllers;

use app\models\AturanAsrama;
use app\models\Siswa;
use app\models\User;
use Yii;
use app\models\Kedisiplinan;
use app\models\search\KedisiplinanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * KedisiplinanController implements the CRUD actions for Kedisiplinan model.
 */
class KedisiplinanController extends Controller
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
     * Lists all Kedisiplinan models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $searchModel = new KedisiplinanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(Yii::$app->user->can('siswa')){
            $user = User::find()->where(['id' => Yii::$app->user->id])->one();

            $dataProvider = new ActiveDataProvider([
                'query' => Kedisiplinan::find()->where(['siswa_id' => $user->username])->orderBy('id ASC'),
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
     * Displays a single Kedisiplinan model.
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
     * Creates a new Kedisiplinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $model = new Kedisiplinan();

            if ($model->load(Yii::$app->request->post())) {
                if($model->tambah_ke_point == 1){
                    $siswa = Siswa::findOne($model->siswa_id);
                    $siswa->kredit_point += $model->aturanAsrama->point;
                    $siswa->save();
                }

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $aturan_asrama = AturanAsrama::find()->all();
            $siswa = Siswa::find()->all();
            return $this->render('create', [
                'model' => $model,
                'siswa' => $siswa,
                'aturan_asrama' => $aturan_asrama
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Updates an existing Kedisiplinan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                $siswa = Siswa::findOne($model->siswa_id);
                $aturan_asrama_lama = AturanAsrama::findOne($model->getOldAttribute('aturan_asrama_id'));

                if($model->tambah_ke_point == 0){
                    if($model->getOldAttribute('tambah_ke_point') == 1){
                        $siswa->kredit_point -=  $aturan_asrama_lama->point;
                        $siswa->save();
                    }
                }
                elseif ($model->tambah_ke_point == 1){
                    if($model->getOldAttribute('tambah_ke_point') == 1){
                        $siswa->kredit_point -=  $aturan_asrama_lama->point;
                        $siswa->kredit_point += $model->aturanAsrama->point;
                        $siswa->save();
                    }else if($model->getOldAttribute('tambah_ke_point') == 0){
                        $siswa->kredit_point += $model->aturanAsrama->point;
                        $siswa->save();
                    }
                }

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $aturan_asrama = AturanAsrama::find()->all();
            $siswa = Siswa::find()->all();
            return $this->render('update', [
                'model' => $model,
                'siswa' => $siswa,
                'aturan_asrama' => $aturan_asrama,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing Kedisiplinan model.
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
     * Finds the Kedisiplinan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kedisiplinan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kedisiplinan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
