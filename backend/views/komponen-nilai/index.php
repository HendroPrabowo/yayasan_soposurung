<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KomponenNilai */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komponen Nilai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-nilai-index">

    <h3><?= Html::encode($this->title) ?> Pelajaran <b><?= $kelas_mata_pelajaran->mataPelajaran->pelajaran ?></b> Kelas <b><?= $kelas_mata_pelajaran->tahunAjaranKelas->kelas->kelas ?></b></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    if($jumlah_siswa == 0){
        echo 'Siswa belum di assign ke kelas ini. '.Html::a('Assign Siswa' ,\yii\helpers\Url::to(['kelas-siswa/assign-siswa', 'id' => $kelas_mata_pelajaran->tahun_ajaran_kelas_id]));
    }
    else if($komponen_nilai == null){
        echo Html::a('Tambah Komponen Nilai' ,\yii\helpers\Url::to(['komponen-nilai/create', 'id' => $id]), ['class' => 'btn btn-success']).'<br><br>';
        echo 'Komponen nilai belum ada. '.Html::a('Tambah Komponen Nilai' ,\yii\helpers\Url::to(['komponen-nilai/create', 'id' => $id])).'<br>';
    }
    else{
        echo Html::a('Tambah Komponen Nilai' ,\yii\helpers\Url::to(['komponen-nilai/create', 'id' => $id]), ['class' => 'btn btn-success']).'<br><br>';
        echo GridView::widget([
            'options' => [
                'style' => [
                    'width' => '300px',
                ]
            ],
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
//                'kelas_mata_pelajaran_id',
                'komponen_nilai',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>

</div>
