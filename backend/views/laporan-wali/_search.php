<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\LaporanWaliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-wali-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'akademik') ?>

    <?= $form->field($model, 'prestasi') ?>

    <?= $form->field($model, 'absensi') ?>

    <?= $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'fisik') ?>

    <?php // echo $form->field($model, 'organisasi') ?>

    <?php // echo $form->field($model, 'administrasi') ?>

    <?php // echo $form->field($model, 'tahun_ajaran_kelas_id') ?>

    <?php // echo $form->field($model, 'siswa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
