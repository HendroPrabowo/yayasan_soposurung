<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KelasR */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-r-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>Silahkan isi nama kelas :</p>

    <?= $form->field($model, 'kelas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
