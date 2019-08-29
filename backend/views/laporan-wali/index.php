<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporanWaliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Wali';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-wali-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php
    if(Yii::$app->user->can('admin')){
        echo Html::a('Tambah Laporan Wali Angkatan Semester Ini', ['create'], ['class' => 'btn btn-success']);
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'angkatan_id',
            [
                'attribute' => 'Angkatan',
                'value' => 'angkatan.angkatan'
            ],
            [
                'attribute' => 'Tahun Ajaran',
                'value' => 'tahunAjaranSemester.tahun_ajaran'
            ],
            [
                'attribute' => 'Semester',
                'value' => 'tahunAjaranSemester.semester'
            ],
//            'tahun_ajaran_semester_id'
            [
                'attribute' => 'Wali',
                'value' => 'angkatan.waliAngkatan.nama'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{laporan}',
                'buttons'=>[
                    'laporan' => function ($url, $model) {
                        return Html::a('Laporan', ['laporan-wali/index-laporan', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
