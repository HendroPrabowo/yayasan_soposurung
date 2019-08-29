<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Angkatan */
/* @var $form yii\widgets\ActiveForm */
$wali_angkatan_all = ArrayHelper::map($wali_angkatan, 'id', 'nama');

?>

<div class="angkatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'angkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wali_angkatan_id')->dropDownList($wali_angkatan_all, ['prompt' => 'Pilih Satu']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
