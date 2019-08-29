<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AplMknMalamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apel Makan Malam';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-mkn-malam-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                        return Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Apel Makan Malam', ['index-apel', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
