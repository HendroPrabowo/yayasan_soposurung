<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SemesterBulanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bulan Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semester-bulan-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php
    if($tahun_ajaran_aktif == null){
        echo '<p>Belum ada tahun ajaran aktif</p>';
    }else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'style' => [
                    'width' => '350px',
                    'margin-top' => '20px'
                ]
            ],
//        'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'bulan',
//            'tahun_ajaran_semester_id',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons'=>[
                        'view' => function ($url, $model) {
                            return Html::a('View', ['bulan-angkatan/index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
                        },
                    ],
                ],
            ],
        ]);
    }
    ?>
</div>
