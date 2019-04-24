<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KelasMataPelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-mata-pelajaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_ajaran_kelas_id')->textInput() ?>

    <?= $form->field($model, 'mata_pelajaran_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
