<?php

namespace backend\controllers;

use app\models\AccountType;
use app\models\AuthAssignment;
use app\models\AuthItem;
use app\models\ChangePassword;
use app\models\ResetPassword;
use app\models\Siswa;
use Yii;
use app\models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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
                'only' => ['index', 'create', 'view', 'sign-up', 'ganti-password', 'reset-password', 'update'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'signup', 'ganti-password', 'reset-password', 'create', 'update'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /*
     * Get authenticated user
     */
    public function user(){
        $user = User::findOne(Yii::$app->user->id);
        return $user;
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Membuat user baru
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new SignupForm();

            // Validasi buatan sendiri
            if($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }

            if($model->load(Yii::$app->request->post())){
                $user_common = new \common\models\User();
                $user_common->setPassword($model->password);
                $user_common->generateAuthKey();

                $user = new User();
                $user->username = $model->username;
                $user->role = $model->role;
                $user->password_hash = $user_common->password_hash;
                $user->auth_key = $user_common->auth_key;
                $user->save();

                $auth_assignment = new AuthAssignment();
                $auth_assignment->item_name = $model->role;
                $auth_assignment->user_id = $user->id;
                $auth_assignment->save();

                // Pengecekan akun ke tabel lain, apakah siswa, guru, pegawai, dll
                if($user->role == 'siswa'){
                    $siswa = new Siswa;
                    $siswa->nisn = $user->username;
                    $siswa->user_id = $user->id;
                    $siswa->save();

                    return $this->actionView($user->id);
                }

                $role = AuthItem::find()->all();
                $model = new SignupForm();
                Yii::$app->session->setFlash('success', 'Akun berhasil ditambah');
                return $this->render('_form_signup', [
                    'model' => $model,
                    'role' => $role,
                ]);
            }

            $role = AuthItem::find()->all();
            return $this->render('_form_signup', [
                'model' => $model,
                'role' => $role,
            ]);
        }else{
            $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Displays a single User model.
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
            $this->redirect(['error/forbidden-error']);
        }

    }
    
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new SignupForm;
            // Validasi buatan sendiri
            if($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }

            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
            }

            return $this->render('_form_signup', [
                'model' => $model,
            ]);
        }else{
            $this->redirect(['error/forbidden-error']);
        }

    }

    /*
     * Ganti password user
     */
    public function actionGantiPassword($id){
        $user = User::findOne($id);
        $model = new ChangePassword();

        if(Yii::$app->request->post()){
            $request = Yii::$app->request->post('ChangePassword');
            $password_lama = $request['password_lama'];
            $password_baru = $request['password_baru'];

            $model->password_lama = $password_lama;
            $model->password_baru = $password_baru;
            $model->password_konfirmasi = $password_baru;

            // Validasi dengan password lama
            if (Yii::$app->getSecurity()->validatePassword($password_lama, $user->password_hash) == false) {
                Yii::$app->session->addFlash('error', 'Password lama salah');
                return $this->render('ganti_password', [
                    'model' => $model,
                ]);
            }

            $password_hash = Yii::$app->security->generatePasswordHash($password_baru);
            $user->password_hash = $password_hash;
            $user->save();

            Yii::$app->session->setFlash('success', 'Password berhasil diganti');
            return $this->actionView($user->id);
        }

        return $this->render('ganti_password', [
            'model' => $model,
        ]);
    }

    /*
     * Logout Account
     */
    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /*
     * Reset Password User
     */
    public function actionResetPassword($id){
        if(Yii::$app->user->can('admin')) {
            $model = new ResetPassword();
            $user = User::findOne($id);

            // Validasi buatan sendiri
            if($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }

            if(Yii::$app->request->post()){
                $hash = Yii::$app->getSecurity()->generatePasswordHash($model->new_password);
                $user = User::findOne(['username' => $user->username]);
                $user->password_hash = $hash;
                $user->save();

                Yii::$app->session->setFlash('success', 'Password '.$model->username.' berhasil diganti');
                return $this->redirect(['user/view', 'id' => $user->id]);
            }

            $model->username = $user->username;
            return $this->render('_form_reset_password', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Update data user
     */
    public function actionUpdate($id){
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if(Yii::$app->request->post()){
                $posted = Yii::$app->request->post('User');
                $model->username = $posted['username'];
                $model->role = $posted['role'];
                $model->authAssignment->item_name = $posted['role'];
                $model->save();

                return $this->actionView($model->id);
            }

            $role = AuthItem::find()->all();
            return $this->render('_form_update', [
                'model' => $model,
                'role' => $role,
            ]);
        }else {
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Hapus akun
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Akun berhasil dihapus');
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
