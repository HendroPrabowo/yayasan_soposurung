<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Yayasan Soposurung';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <!-- /.login-logo -->

    <?php
        if(isset($status)){
            if($status == 0){
                echo '<div class="alert-error alert fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
                    <i class="icon fa fa-warning"></i>Akun Sudah Tidak Aktif. Silahkan Menghubungi Admin
                </div>';
            }
        }
    ?>

    <div class="login-box-body">
        <div class="login-logo">
            <img src="/yayasan_soposurung/backend/web/uploads/logo/yayasan_soposurung_logo_new.png" class="center" style="height: 100px; width: 100px; margin-bottom: 5px">
            <p class="text-center" style="color: black; font-size: 20px">Yayasan Soposurung</p>
        </div>
        <hr>
       <!-- <p class="login-box-msg">Sign in to start your session</p> -->

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <p><b>Username</b></p>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput() ?>

        <p><b>Password</b></p>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput() ?>

        <div class="row">
            <div class="col-xs-8">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


        <!--
        <a href="#">I forgot my password</a><br>
        <a href="<?= \yii\helpers\Url::to(['user/signup']) ?>" class="text-center">Register a new membership</a>
        -->
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
