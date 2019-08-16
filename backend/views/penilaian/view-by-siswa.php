<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Nilai';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penilaian-view">
    <h3>Daftar Nilai <?= $siswa->nama ?> (<?= $siswa->nisn ?>)</h3>
    <?php
    foreach ($tahun_ajaran_siswa_aktif as $value){
        echo '<h3>'.$value->tahun_ajaran.' Semester'.$value->semester.'</h3><br>';
        foreach ($value->tahunAjaranKelas as $value1){
            if(in_array($value1->id, $temp1)){
                // Nama Kelasnya
//                echo '<h4>'.$value1->kelas->kelas.'</h4><br>';
                foreach ($value1->kelasMataPelajaran as $value2){
//                    echo $value2->mataPelajaran->pelajaran.'<br>';
                    echo '<p style="font-size: 20px"><b>'.$value2->mataPelajaran->pelajaran.'</b></p>';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Komponen Nilai</th><th>Nilai</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($value2->komponenNilai as $value3){
//                        echo $value3->komponen_nilai.' = ';
                        echo '<tr>';
                        echo '<td>'.$value3->komponen_nilai;
                        foreach ($value3->penilaian as $value4){
                            if(in_array($value4->id, $penilaian_id)){
//                                echo $value4->nilai.'<br>';
                                echo '<td>'.$value4->nilai;
                                echo '</td>';
                            }
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                }
            }
        }
    }
    ?>
</div>
