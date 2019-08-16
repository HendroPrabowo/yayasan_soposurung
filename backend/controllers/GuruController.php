<?php

namespace backend\controllers;

use app\models\GuruUpdate;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\Guru;
use app\models\search\GuruSearch;
use yii\bootstrap\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\widgets\ActiveForm;

/**
 * GuruController implements the CRUD actions for Guru model.
 */
class GuruController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'mata-pelajaran'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'mata-pelajaran'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Guru models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $searchModel = new GuruSearch();
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
     * Displays a single Guru model.
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
     * Creates a new Guru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new Guru();

            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }

            if ($model->load(Yii::$app->request->post())) {
                // Create akun untuk guru
                $user_common = new \common\models\User();
                $user_common->setPassword($model->username);
                $user_common->generateAuthKey();

                $user = new User();
                $user->username = $model->username;
                $user->role = 'guru';
                $user->password_hash = $user_common->password_hash;
                $user->auth_key = $user_common->auth_key;
                $user->is_active = 0;
                $user->save();

                $model->user_id = $user->id;
                $model->save();

                Yii::$app->session->addFlash('success', 'Akun '.$user->username.' berhasil dibuat');
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
     * Updates an existing Guru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if(Yii::$app->request->post()){
                $request = Yii::$app->request->post();

                $guru = GuruUpdate::findOne($id);

                $guru->no_induk_guru = $request['no_induk_guru'];
                $guru->nama = $request['nama'];
                $guru->save();

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
     * Deletes an existing Guru model.
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
     * Finds the Guru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMataPelajaran(){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
            $tahun_ajaran_kelas = $tahun_ajaran_aktif->tahunAjaranKelas;
            $kelas_mata_pelajaran = array();

            // Ambil semua kelas yang ada pada tahun ajaran tersebut
            foreach ($tahun_ajaran_kelas as $value){
//                echo $value->id.' Punya kelas : <br>';
                foreach ($value->kelasMataPelajaran as $value2){
//                    echo $value2->id.'<br>';
                    $kelas_mata_pelajaran[] = $value2;
                }
//                echo '<br>';
            }

            // Ambil semua guru yang sudah diassign ke pelajaran
            $assign_guru = array();
            foreach ($kelas_mata_pelajaran as $value){
                if(!is_null($value->assignGuru)){
                    $assign_guru[] = $value->assignGuru;
                }
            }

            // Ambil id guru yang login
            $guru = Guru::find()->where(['user_id' => Yii::$app->user->id])->one();


            $assign_guru_terpilih = array();
            foreach ($assign_guru as $value){
                if($value->guru_id == $guru->id){
                    $assign_guru_terpilih[] = $value;
                }
            }

            return $this->render('index_guru', [
                'assign_guru_terpilih' => $assign_guru_terpilih,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
