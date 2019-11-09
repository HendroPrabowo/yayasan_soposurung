<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AngkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Angkatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angkatan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php
        if(!Yii::$app->user->can('supervisor')){
            echo Html::a('Tambah Angkatan', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php
    if(!Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'style' => [
                    'width' => '700px',
                    'margin-top' => '20px'
                ]
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'angkatan',
                [
                    'attribute' => 'Wali Angkatan',
                    'value' => 'waliAngkatan.nama'
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                ],
            ],
        ]);
    }else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'style' => [
                    'width' => '700px',
                    'margin-top' => '20px'
                ]
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'angkatan',
                [
                    'attribute' => 'Wali Angkatan',
                    'value' => 'waliAngkatan.nama'
                ],
            ],
        ]);
    }
    ?>
</div>
