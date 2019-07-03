<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SwSenamAplPgiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apel Malam';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-apel-pagi-index">

    <h3><?= Html::encode($this->title) ?> <?=  date("d-M-Y", strtotime($jurnal_laporan_piket->tanggal)); ?></h3>

    <?php
    if(count($apel_pagi_kelas) != 0){
        echo 'Apel Malam Sudah Dibuat. Silahkan hubungi Admin Untuk Mengubah';
    }else{
        echo Html::a('Isi Apel Malam', ['apl-malam/create', 'id' => $jurnal_laporan_piket->id], ['class' => 'btn btn-success']);
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'style' => [
                'margin-top' => '10px'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'tahun_ajaran_kelas_id',
            [
                'attribute' => 'Kelas',
                'value' => 'tahunAjaranKelas.kelas.kelas'
            ],
            'jumlah',
            'hadir',
            'tidak_hadir',
            'keterangan_tidak_hadir',
//            'jurnal_laporan_id',
        ],
    ]); ?>
</div>
