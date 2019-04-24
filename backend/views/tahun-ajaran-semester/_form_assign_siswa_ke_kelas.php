<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Assign Siswa';

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaranSemester */
/* @var $form yii\widgets\ActiveForm */
$siswa = \yii\helpers\ArrayHelper::map($semua_siswa, 'nisn', 'nisn');

?>

<div class="tahun-ajaran-semester-form">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nisn')->checkboxList($siswa) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
