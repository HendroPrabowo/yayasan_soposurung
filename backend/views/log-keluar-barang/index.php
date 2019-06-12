<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogKeluarBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Keluar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluar-masuk-barang-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Log Barang Keluar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nama_barang',
//            'tanggal',
            'vendor',
            'jumlah',
//            'created_by',
            [
                'attribute' => 'Created',
                'value' => 'createdBy.role'
            ],
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],
//            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
