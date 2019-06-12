<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$item_siswa = ArrayHelper::map($siswa, 'nisn', 'KeteranganSiswa');
?>

<div class="kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siswa_id')->widget(Select2::classname(), [
        'data' => $item_siswa,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Siswa ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'penyakit')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'semester')->textInput([
            'type' => 'number'
    ]) ?>

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
