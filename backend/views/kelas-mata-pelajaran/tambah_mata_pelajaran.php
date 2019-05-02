<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Tambah Mata Pelajaran';

?>
<div class="kelas-mata-pelajaran-create">

    <h3><?= $this->title ?> untuk Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas ?></b></h3>

    <?= Html::beginForm(Url::to('tambah-mata-pelajaran-post'), 'post') ?>
    <div class="form-group">
        <input type="hidden" name="kelas" value="<?= $tahun_ajaran_kelas->kelas->id ?>">
        <input type="hidden" name="semester" value="<?= $tahun_ajaran_kelas->tahunAjaranSemester->id ?>">

        <label>Pilih Mata Pelajaran</label>
        <?php
            foreach ($mata_pelajaran as $value){
                echo "<br>".Html::input('checkbox', 'pelajaran'.$value->id, $value->id)." ".$value->pelajaran;
            }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

    </div>

    <?= Html::endForm() ?>

</div>
