<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\BulanAngkatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bulan-angkatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_briva')->textInput() ?>

    <?= $form->field($model, 'jumlah_disetor')->textInput() ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal ....'],
        'readonly' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'lunas')->dropDownList([1 => 'Lunas', 0 => 'Belum Lunas'], ['prompt' => 'Pilih Satu']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
