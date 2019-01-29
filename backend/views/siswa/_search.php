<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nisn') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'kelahiran') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status_dalam_keluarga') ?>

    <?php // echo $form->field($model, 'anak_ke') ?>

    <?php // echo $form->field($model, 'sekolah_asal') ?>

    <?php // echo $form->field($model, 'nama_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'alamat_orang_tua') ?>

    <?php // echo $form->field($model, 'nomor_telepon_orang_tua') ?>

    <?php // echo $form->field($model, 'pekerjaan_ayah') ?>

    <?php // echo $form->field($model, 'pekerjaan_ibu') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
