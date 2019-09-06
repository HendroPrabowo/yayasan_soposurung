<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulan-angkatan-index">
    <h3>List Pembayaran Angkatan <?= $bulan_angkatan->angkatan->angkatan ?>, Bulan : <?= $bulan_angkatan->semesterBulan->bulan ?></h3>

    <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'siswa_id',
            [
                'attribute' => 'NISN',
                'value' => 'siswa_id',
            ],
            [
                'attribute' => 'Nama',
                'value' => 'siswa.nama',
            ],
            'tanggal',
            'lunas',
            'jumlah_disetor',
            'kode_briva',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
            ]
        ],
    ]);
    ?>
</div>
