<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Penilaian */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'style' => [
                'width' => '500px',
                'margin-top' => '20px'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Pelajaran',
                'value' => 'mataPelajaran.pelajaran'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{komponen-nilai}',
                'buttons'=>[
                    'komponen-nilai'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span> Komponen Nilai', ['penilaian/view-komponen-nilai', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
