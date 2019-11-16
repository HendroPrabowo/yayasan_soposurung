<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KedisiplinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kedisiplinan-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'siswa_id',
//            [
//                'attribute' => 'siswa',
//                'value' => 'siswa.nama'
//            ],
            [
                'attribute' => 'Jenis Pelanggaran',
                'value' => 'aturanAsrama.jenis_pelanggaran'
            ],
            [
                'attribute' => 'Kredit Point',
                'value' => 'aturanAsrama.point'
            ],
//            'aturan_asrama_id',
            'keterangan:ntext',
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],
//            'tambah_ke_point',
            [
                    'attribute' => 'Tambah Point',
                'value' => function(\yii\base\Model $model){
                    if($model->tambah_ke_point == 0){
                        return "Tidak";
                    }elseif($model->tambah_ke_point == 1){
                        return "Ya";
                    }else{
                        return '-----';
                    }
                }
            ],
        ],
    ]); ?>
</div>
