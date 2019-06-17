<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LogTamu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-tamu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_tamu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan_dan_keperluan')->textarea(['rows' => 6]) ?>

    <!--
    <?= $form->field($model, 'waktu_masuk')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Waktu Masuk ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'waktu_keluar')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Waktu Masuk ...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]);
    ?>
    -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
