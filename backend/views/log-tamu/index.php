<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogTamuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Tamu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-tamu-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Log Tamu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '-',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nama_tamu',
            'tujuan_dan_keperluan:ntext',
//            'waktu_masuk',
            [
                'attribute' => 'waktu_masuk',
                'format' => ['date', 'php:d-M-Y H:i:s']
            ],
//            'waktu_keluar',
            [
                'attribute' => 'waktu_keluar',
                'format' => ['date', 'php:d-M-Y H:i:s']
            ],
//            'user_id',
            [
                'attribute' => 'User',
                'value' => 'user.username'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {keluar}',
                'buttons'=>[
                    'keluar' => function ($url, $model) {
                        return Html::a('<z style="color: red;"><span class="glyphicon glyphicon-log-out"></span>Keluar</z>', ['log-tamu/keluar', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
