<?php
use yii\grid\GridView;
?>

<h3>Pelanggaran yang dilakukan</h3>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'siswa_id',
        [
            'attribute' => 'siswa',
            'value' => 'siswa.nama'
        ],
        [
            'attribute' => 'Jenis Pelanggaran',
            'value' => 'aturanAsrama.jenis_pelanggaran'
        ],
        [
            'attribute' => 'Kredit Point',
            'value' => function(\yii\base\Model $model){
                if($model->tambah_ke_point == 1){
                    return $model->aturanAsrama->point;
                }else{
                    return 0;
                }
            }
        ],
//            'aturan_asrama_id',
        'keterangan:ntext',
//            'tambah_ke_point',
        [
            'attribute' => 'Tambah Point',
            'value' => function(\yii\base\Model $model){
                if($model->tambah_ke_point == 0){
                    return "Tidak";
                }else{
                    return "Ya";
                }
            }
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
