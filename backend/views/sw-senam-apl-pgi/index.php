<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SwSenamAplPgiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apel Pagi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-apel-pagi-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Apel Pagi Hari Ini', ['create-apel-hari-ini'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'options' => [
            'style' => [
                'width' => '500px',
                'margin-top' => '20px'
            ]
        ],
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'tanggal',
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create}',
                'buttons'=>[
                    'create' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Apel Pagi', ['index-apel', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
