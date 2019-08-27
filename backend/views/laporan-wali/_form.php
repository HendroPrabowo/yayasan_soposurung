<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanWali */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-wali-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prestasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'absensi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fisik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'organisasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'administrasi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
