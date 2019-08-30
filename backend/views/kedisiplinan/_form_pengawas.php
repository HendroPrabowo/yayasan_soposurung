<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$array = [
    ['name' => 'Ya', 'value' => 1],
    ['name' => 'Tidak', 'value' => 0],
];

$item = ArrayHelper::map($array, 'value', 'name');
$item_siswa = ArrayHelper::map($siswa, 'nisn', 'KeteranganSiswa');
$item_aturan_asrama = ArrayHelper::map($aturan_asrama, 'id', 'jenis_pelanggaran');

//var_dump($item);
//die();

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kedisiplinan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siswa_id')->widget(Select2::classname(), [
        'data' => $item_siswa,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Siswa ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'aturan_asrama_id')->widget(Select2::classname(), [
        'data' => $item_aturan_asrama,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Aturan yang Dilanggar ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tambah_ke_point')->hiddenInput(['value' => '3'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
