<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LogMasukBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-masuk-barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal ....'],
        'readonly' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
        ]);
    ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
