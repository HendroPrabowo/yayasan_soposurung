<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SemesterBulan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="semester-bulan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bulan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_ajaran_semester_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
