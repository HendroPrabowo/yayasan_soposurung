<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kesehatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siswa_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesehatan')->textInput(['maxlength' => true]) ?>

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
