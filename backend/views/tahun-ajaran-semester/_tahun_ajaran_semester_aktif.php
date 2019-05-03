<?php

use yii\helpers\Html;

// Jika tahun ajaran belum ada
if($tahun_ajaran_aktif == null){
    echo '<h4 style="margin-top: 10px">Belum ada tahun ajaran</h4>';
    echo '<p>Silahkan tambahkan tahun ajaran baru</p>';
}
// Jika tahun ajaran belum punya kelas
elseif($tahun_ajaran_aktif->tahunAjaranKelas == null){
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
        echo Html::a($value->kelas->kelas, ['kelas-mata-pelajaran/view-mata-pelajaran', 'id' => $value->id])."<br>";
    }
    echo '<br>';
    echo Html::a('Ubah Kelas', ['ubah-assign-kelas', 'id' => $tahun_ajaran_aktif->id], ['class' => 'btn btn-danger']);
}

?>