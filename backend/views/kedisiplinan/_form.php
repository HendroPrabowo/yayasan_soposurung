<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$array = [
    ['name' => 'Ya', 'value' => 1],
    ['name' => 'Tidak', 'value' => 0],
];

$item = ArrayHelper::map($array, 'value', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kedisiplinan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siswa_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aturan_asrama_id')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tambah_ke_point')->dropDownList($item, ['prompt' => 'Pilih Satu...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
