<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kesehatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesehatan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    if(!Yii::$app->user->can('supervisor')){
        echo Html::a('Tambah Laporan Kesehatan', ['create'], ['class' => 'btn btn-success']);
    }
    ?>

    <?php
    if(Yii::$app->user->can('admin')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'siswa_id',
                [
                    'attribute' => 'NISN',
                    'value' => 'siswa_id'
                ],
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                'penyakit',
//            'keterangan',
//            'tahun_ajaran_semester_id',
                [
                    'attribute' => 'Semester',
                    'value' => function($model){
                        return $model->tahunAjaranSemester->tahun_ajaran.' '.$model->tahunAjaranSemester->semester;
                    }
                ],
//            'tanggal',
                'created_by',

                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                ],
            ],
        ]);
    }elseif(Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'NISN',
                    'value' => 'siswa_id'
                ],
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                'penyakit',
                [
                    'attribute' => 'Semester',
                    'value' => function($model){
                        return $model->tahunAjaranSemester->tahun_ajaran.' '.$model->tahunAjaranSemester->semester;
                    }
                ],
                'created_by',

                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
            ],
        ]);
	}
    else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'NISN',
                    'value' => 'siswa_id'
                ],
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                'penyakit',
                [
                    'attribute' => 'Semester',
                    'value' => function($model){
                        return $model->tahunAjaranSemester->tahun_ajaran.' '.$model->tahunAjaranSemester->semester;
                    }
                ],
                'created_by',

                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}'
                ],
            ],
        ]);
    }
    ?>
</div>
