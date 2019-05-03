<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Angkatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="angkatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'angkatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
