<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

$kelas_all = ArrayHelper::map($kelas, 'id', 'kelas');
$angkatan_all = ArrayHelper::map($angkatan, 'id', 'angkatan');

?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nisn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelahiran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_dalam_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anak_ke')->textInput() ?>

    <?= $form->field($model, 'sekolah_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_orang_tua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nomor_telepon_orang_tua')->textInput() ?>

    <?= $form->field($model, 'pekerjaan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siswa_thn_kls')->dropDownList($kelas_all, ['prompt' => 'Pilih Satu']) ?>

    <?= $form->field($model, 'angkatan_id')->dropDownList($angkatan_all, ['prompt' => 'Pilih Satu']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
