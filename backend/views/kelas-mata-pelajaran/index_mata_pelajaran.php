<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasMataPelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-mata-pelajaran-index">

    <h3>Mata Pelajaran pada Kelas <strong><?= $tahun_ajaran_kelas->kelas->kelas ?></strong> Semester <strong><?= $tahun_ajaran_kelas->tahunAjaranSemester->semester ?></strong></h3>

    <?php
    $i = 1;
    if($tahun_ajaran_kelas->kelasMataPelajarans == null){
                echo '<h4>Belum ada mata pelajaran di assign ke kelas ini</h4>';
        echo Html::a('Tambah Mata Pelajaran', ['tambah-mata-pelajaran', 'id' => $tahun_ajaran_kelas->id], ['class' => 'btn btn-success']);
    }else{

        echo '<div class="col-md-5">';
        echo Html::a('Tambah Mata Pelajaran', ['tambah-mata-pelajaran', 'id' => $tahun_ajaran_kelas->id], ['class' => 'btn btn-success']);
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr><th>No.</th><th>Pelajaran</th><th>Action</th></tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($tahun_ajaran_kelas->kelasMataPelajarans as $value){
            echo '<tr><td>'.$i.'</td><td>'.$value->mataPelajaran->pelajaran.'</td><td><a href="#" class="btn btn-danger btn-sm">Delete</a></td></tr>';
            $i++;
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    ?>
</div>
