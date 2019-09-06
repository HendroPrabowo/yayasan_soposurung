<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaranSemester */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Assign Kelas";

?>

<div class="tahun-ajaran-semester-form">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= Html::beginForm(Url::to('assign-kelas?id='.$tahun_ajaran_aktif->id), 'post') ?>

    <div class="form-group">
        <label>Pilih Kelas</label>
        <?php
        foreach ($kelas as $value){
            echo "<br>".Html::input('checkbox', 'kelas'.$value->id, $value->id)." ".$value->kelas;
        }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="margin-top: 10px">Simpan</button>
        </div>

    </div>

    <?= Html::endForm() ?>

</div>
