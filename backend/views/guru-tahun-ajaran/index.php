<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Guru Aktif';

?>
<div class="guru-tahun-ajaran-index">

    <?php
    if($tahun_ajaran_aktif == null){
        echo '<h3>Belum ada tahun ajaran yang aktif</h3>';
    }else{
        echo '<h3><?= $this->title ?> pada Tahun Ajaran <b><?= $tahun_ajaran_aktif->tahun_ajaran ?></b> Semester <b><?= $tahun_ajaran_aktif->semester ?></b></h3>';
    }
    ?>
    <?php
    if($guru_tahun_ajaran == null){
        echo '<h4>Silahkan tambah tahun ajaran baru terlebih dahulu</h4>';
    }else if(sizeof($guru_tahun_ajaran ) == 0){
        echo '<h4>Belum ada guru di assign ke semester ini</h4>';
        echo '<a href="'.Url::to("tambah-guru").'" class="btn btn-success">Tambah Guru</a>';
    }else{
        $i = 1;
        echo '<div class="col-md-8">';
        echo '<a href="'.Url::to("tambah-guru").'" class="btn btn-success">Tambah Guru</a>';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr><th>No.</th><th>No Induk Guru</th><th>Nama</th><th>Action</th></tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($guru_tahun_ajaran as $value){
            echo '<tr><td>'.$i.'</td><td>'.$value->guru->no_induk_guru.'</td><td>'.$value->guru->nama.'</td><td><a href="#" class="btn btn-danger">Delete</a></td></tr>';
            $i++;
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    ?>

</div>
