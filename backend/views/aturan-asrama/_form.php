<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AturanAsrama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aturan-asrama-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_pelanggaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'point')->textInput([
            'type' => 'number',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
