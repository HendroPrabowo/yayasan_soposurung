<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Tambah Akun';
$this->params['breadcrumbs'][] = $this->title;

$all_role = \yii\helpers\ArrayHelper::map($role, 'name', 'name');
?>
<div class="site-signup">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>Silahkan isi untuk menambah akun :</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'enableAjaxValidation' => true]); ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                <?= $form->field($model, 'role')->dropDownList($all_role, ['prompt' => 'Pilih satu']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
