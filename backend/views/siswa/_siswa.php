<?php

use yii\grid\GridView;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'nisn',
        'nama',
//            'kelas_id',
//            'kelahiran',
//            'jenis_kelamin',
//            'agama',
        //'status_dalam_keluarga',
        //'anak_ke',
        //'sekolah_asal',
        //'nama_ayah',
        //'nama_ibu',
        //'alamat_orang_tua:ntext',
        //'nomor_telepon_orang_tua',
        //'pekerjaan_ayah',
        //'pekerjaan_ibu',
        //'user_id',
        'kredit_point',
//            'angkatan_id',
        [
            'attribute' => 'Angkatan',
            'value' => 'angkatan.angkatan',
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>