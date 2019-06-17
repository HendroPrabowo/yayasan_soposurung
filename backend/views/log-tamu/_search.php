<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\LogTamuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-tamu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_tamu') ?>

    <?= $form->field($model, 'tujuan_dan_keperluan') ?>

    <?= $form->field($model, 'waktu_masuk') ?>

    <?= $form->field($model, 'waktu_keluar') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
