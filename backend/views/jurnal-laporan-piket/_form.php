<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JurnalLaporanPiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-laporan-piket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'piket1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piket2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wakil_piket1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wakil_piket2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
