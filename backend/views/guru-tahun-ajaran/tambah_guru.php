<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Tambah Guru Aktif';
?>

<div>

    <h3><?= $this->title ?> Untuk tahun ajaran <b><?= $tahun_ajaran_semester->tahun_ajaran ?></b> semester <b><?= $tahun_ajaran_semester->semester ?></b></h3>

    <?= Html::beginForm(Url::to('tambah-guru'), 'post') ?>
    <div class="form-group">
        <label>Pilih Guru</label>
        <?php
        foreach ($guru as $value){
            echo "<br>".Html::input('checkbox', $value->id, $value->id)." ".$value->nama;
        }
        ?>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <?= Html::endForm() ?>

</div>
