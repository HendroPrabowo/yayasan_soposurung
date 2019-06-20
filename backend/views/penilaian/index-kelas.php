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

    <h3><?= Html::encode($this->title) ?> Tahun Ajaran <b><?= $tahun_ajaran->tahun_ajaran ?></b> semester <b><?=  $tahun_ajaran->semester ?></b></h3>
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
                'attribute' => 'Kelas',
                'value' => 'kelas.kelas'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{lihat-penilaian}',
                'buttons'=>[
                    'lihat-penilaian'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span> Lihat Pelajaran', ['penilaian/view-mata-pelajaran', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
