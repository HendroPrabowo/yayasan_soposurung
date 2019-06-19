<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenNilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponen-nilai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'komponen_nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
