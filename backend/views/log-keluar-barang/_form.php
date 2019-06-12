<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LogKeluarBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keluar-masuk-barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal ....'],
        'readonly' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
