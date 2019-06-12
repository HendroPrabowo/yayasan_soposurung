<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiswaNilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-nilai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas_siswa_id')->textInput() ?>

    <?= $form->field($model, 'kelas_mata_pelajaran_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
