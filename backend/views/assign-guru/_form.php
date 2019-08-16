<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AssignGuru */
/* @var $form yii\widgets\ActiveForm */

$guru_all = ArrayHelper::map($guru, 'id', 'namaLengkap');

?>

<div class="assign-guru-form">

    <h3>Assign Guru untuk Pelajaran : <b><?= $kelas_mata_pelajaran->mataPelajaran->pelajaran ?></b>, Kelas : <b><?= $kelas_mata_pelajaran->tahunAjaranKelas->kelas->kelas ?></b></h3>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'guru_id')->widget(Select2::className(), [
        'name' => 'guru',
        'data' => $guru_all,
        'options' => [
            'placeholder' => 'Pilih Guru ....',
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
