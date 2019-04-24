<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Tambah Mata Pelajaran';

?>
<div class="kelas-mata-pelajaran-create">

    <h3><?= $this->title ?> untuk Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas ?></b></h3>

    <?= Html::beginForm(Url::to('tambah-mata-pelajaran-post'), 'post') ?>
    <input type="hidden" name="id_tahun_ajaran_kelas" value="<?= $tahun_ajaran_kelas->id ?>">

    <div class="form-group">
        <label>Pilih Mata Pelajaran</label>
        <?php
            foreach ($mata_pelajaran as $value){
                echo "<br>".Html::input('checkbox', 'pelajaran'.$value->id, $value->pelajaran)." ".$value->pelajaran;
            }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

    </div>

    <?= Html::endForm() ?>

</div>
