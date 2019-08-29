<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\JurnalLaporanPiket */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jurnal Laporan Piket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnal-laporan-piket-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jurnal Laporan Piket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    if(Yii::$app->user->can('admin')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'tanggal',
//            'user_id',
                'piket1',
                'piket2',
                'wakil_piket1',
                'wakil_piket2',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {view} {print}',
                    'buttons'=>[
                        'print' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-print"></span> Print', ['print-laporan', 'id' => $model->id], ['target' => '_blank']);
                        },
                    ],
                ],
            ],
        ]);
    }elseif (Yii::$app->user->can('piket')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'tanggal',
//            'user_id',
                'piket1',
                'piket2',
                'wakil_piket1',
                'wakil_piket2',
            ],
        ]);
    }elseif (Yii::$app->user->can('kepala asrama')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'tanggal',
//            'user_id',
                'piket1',
                'piket2',
                'wakil_piket1',
                'wakil_piket2',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print}',
                    'buttons'=>[
                        'print' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-print"></span> Print', ['print-laporan', 'id' => $model->id], ['target' => '_blank']);
                        },
                    ],
                ],
            ],
        ]);
    }
    ?>
</div>
