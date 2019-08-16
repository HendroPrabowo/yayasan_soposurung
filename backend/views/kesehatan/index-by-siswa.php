<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kesehatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesehatan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'siswa_id',
//            [
//                'attribute' => 'NISN',
//                'value' => 'siswa_id'
//            ],
//            [
//                'attribute' => 'siswa',
//                'value' => 'siswa.nama'
//            ],
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],
            'penyakit',
            'keterangan',
            'semester',
//            'tanggal',
//            'created_by',

        ],
    ]); ?>
</div>
