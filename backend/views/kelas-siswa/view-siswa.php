<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-siswa-index">

    <h3>List Siswa Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas ?></b></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nisn',
            [
                'attribute' => 'Nama',
                'value' => 'siswa.nama'
            ],
            [
                'attribute' => 'Kelas',
                'value' => 'thnAjaranKelas.kelas.kelas'
            ],
            [
                'attribute' => 'Angkatan',
                'value' => 'siswa.angkatan.angkatan'
            ],
        ]
    ]); ?>

</div>
