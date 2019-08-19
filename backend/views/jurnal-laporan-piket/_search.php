<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\JurnalLaporanPiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-laporan-piket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jam') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'wakil_piket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
