<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SwAplMknPgiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sw-apl-mkn-pgi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kelas') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'hadir') ?>

    <?= $form->field($model, 'tidak_hadir') ?>

    <?php // echo $form->field($model, 'keterangan_tidak_hadir') ?>

    <?php // echo $form->field($model, 'jurnal_laporan_piket_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
