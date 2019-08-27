<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanWali */
/* @var $form yii\widgets\ActiveForm */
$angkatan_all = \yii\helpers\ArrayHelper::map($angkatan, 'id', 'angkatan');
?>

<div class="laporan-wali-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($semester_angkatan, 'angkatan')->dropDownList($angkatan_all, ['prompt'=>'Pilih Angkatan']) ?>

    <div class="form-group">
        <?= Html::submitButton('Pilih', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
