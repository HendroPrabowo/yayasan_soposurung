<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaranSemester */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Assign Kelas";

$kelas_all = \yii\helpers\ArrayHelper::map($kelas, 'id', 'kelas');

?>

<div class="tahun-ajaran-semester-form">

    <h3><?= Html::encode($this->title) ?></h3>

    <h4>Form dengan Yii 2</h4>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_ajaran_semester_id')->hiddenInput(['value' => $tahun_ajaran_aktif->id])->label(false) ?>

    <?= $form->field($model, 'kelas_id')->input('integer')->checkboxList($kelas_all) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>

    <hr>
    <p>Form Baru</p>

    <?= Html::beginForm(Url::to('assign-kelas?id='.$tahun_ajaran_aktif->id), 'post') ?>

    <div class="form-group">
        <label>Pilih Kelas</label>
        <?php
        foreach ($kelas as $value){
            echo "<br>".Html::input('checkbox', 'kelas'.$value->id, $value->id)." ".$value->kelas;
        }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

    </div>

    <?= Html::endForm() ?>

</div>
