<?php

namespace backend\controllers;

use app\models\Guru;
use app\models\KelasMataPelajaran;
use Yii;
use app\models\AssignGuru;
use app\models\search\AssignGuruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AssignGuruController implements the CRUD actions for AssignGuru model.
 */
class AssignGuruController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'assign-guru'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'assign-guru'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all AssignGuru models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $searchModel = new AssignGuruSearch();
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
     * Displays a single AssignGuru model.
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
     * Creates a new AssignGuru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new AssignGuru();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
     * Updates an existing AssignGuru model.
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
     * Deletes an existing AssignGuru model.
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
     * Finds the AssignGuru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssignGuru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignGuru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * Assign guru ke matapelajaran
     */
    public function actionAssignGuru($id){
        if(Yii::$app->user->can('admin')) {
            $model = new AssignGuru();
            $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);

            if(Yii::$app->request->post()){
                $request = Yii::$app->request->post();

                $cek_assign_guru = $kelas_mata_pelajaran->assignGuru;
                if($cek_assign_guru == null){
                    $assign_guru = new AssignGuru();
                    $assign_guru->kelas_mata_pelajaran_id = $id;
                    $assign_guru->guru_id = $request['AssignGuru']['guru_id'];
                    $assign_guru->save();

                    $guru = Guru::findOne($request['AssignGuru']['guru_id']);
                    $user = $guru->user;
                    $user->is_active = 1;
                    $user->save();
                }else{
                    $assign_guru = AssignGuru::findOne($cek_assign_guru->id);
                    $assign_guru->guru_id = $request['AssignGuru']['guru_id'];
                    $assign_guru->save();

                    $guru = Guru::findOne($request['AssignGuru']['guru_id']);
                    $user = $guru->user;
                    $user->is_active = 1;
                    $user->save();
                }

                return $this->redirect(['kelas-mata-pelajaran/view-mata-pelajaran?id='.$assign_guru->kelasMataPelajaran->tahun_ajaran_kelas_id]);
            }

            $guru = Guru::find()->all();
            return $this->render('create', [
                'model' => $model,
                'guru' => $guru,
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }
}
