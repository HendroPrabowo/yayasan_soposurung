<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$this->title = 'Reset Password : '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Semua User', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Reset Password';
?>
<div class="site-signup">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="col-md-5">
            <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]) ?>

            <?= $form->field($model, 'new_password')->widget(PasswordInput::classname(), [
                'pluginOptions' => [
                    'showMeter' => false,
                    'toggleMask' => true,
                    'toggleTitle' => "Show/Hide Password"
                ],
            ]);?>

            <?= $form->field($model, 'password_repeat')->widget(PasswordInput::classname(), [
                'pluginOptions' => [
                    'showMeter' => false,
                    'toggleMask' => true,
                    'toggleTitle' => "Show/Hide Password",
                ],
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Ganti Password', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
