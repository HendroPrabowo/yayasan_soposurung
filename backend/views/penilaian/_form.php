<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penilaian-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--
    <?= $form->field($model, 'kelas_siswa_id')->textInput() ?>

    <?= $form->field($model, 'komponen_nilai_id')->textInput() ?>
    -->

    <?= $form->field($model, 'nilai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
