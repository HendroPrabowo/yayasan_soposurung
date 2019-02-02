<?php

use yii\helpers\Html;

// Jika tahun ajaran belum punya kelas
if($tahun_ajaran_aktif->tahunAjaranKelas == null){
    echo '<h4>Tahun ajaran <b>'.$tahun_ajaran_aktif->tahun_ajaran.'</b> Semester <b>'.$tahun_ajaran_aktif->semester.'</b></h4>';
    echo '<p style="margin-top: 10px">Belum ada kelas yang dibuka</p>';
    echo '<a href="assign-kelas?id='.$tahun_ajaran_aktif->id.'" class="btn btn-primary">Assign Kelas</a>';
}else{
    // Jika sudah ada kelas yang di assign
    $kelas = $tahun_ajaran_aktif->tahunAjaranKelas;
    echo '
    <h4>Kelas pada tahun ajaran <b>'.$tahun_ajaran_aktif->tahun_ajaran.'</b> Semester <b>'.$tahun_ajaran_aktif->semester.'</b></h4>
    ';

    foreach ($kelas as $value){
        echo '
            <a href="#">'.$value->kelas->kelas.'</a><br>
        ';
    }
    echo '<br>';
    echo Html::a('Ubah Kelas', ['ubah-assign-kelas', 'id' => $tahun_ajaran_aktif->id], ['class' => 'btn btn-warning']);
}

?>