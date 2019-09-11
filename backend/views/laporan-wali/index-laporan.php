<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporanWaliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Wali Angkatan '.$semester_angkatan->angkatan->angkatan;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-wali-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    if(Yii::$app->user->can('admin')){
        echo Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Template', ['laporan-wali/download-template', 'id' => $id], ['class' => 'btn btn-primary']).' ';
        echo Html::a('<span class="glyphicon glyphicon-upload"></span> Upload', ['laporan-wali/upload-template', 'id' => $id], ['class' => 'btn btn-success']);
    }if(Yii::$app->user->can('wali angkatan') && $semester_angkatan->excel != 1){
        echo Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Template', ['laporan-wali/download-template', 'id' => $id], ['class' => 'btn btn-primary']).' ';
        echo Html::a('<span class="glyphicon glyphicon-upload"></span> Upload', ['laporan-wali/upload-template', 'id' => $id], ['class' => 'btn btn-success']);
    }
    ?>

    <?php
    if(Yii::$app->user->can('admin')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'akademik',
//            'prestasi',
//            'absensi',
//            'catatan',
//            'fisik',
//            'organisasi',
//            'administrasi',
//            'semester_angkatan_id',
                'siswa_id',
                [
                    'attribute' => 'Nama',
                    'value' => 'siswa.nama'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print} {edit} {view}',
                    'buttons'=>[
                        'print' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-print"></span> Print', ['laporan-wali/print', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm', 'target' => '_blank']);
                        },
                        'edit' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['laporan-wali/update', 'id' => $model->id], ['class' => 'btn btn-success btn-sm']);
                        },
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['laporan-wali/view', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm']);
                        },
                    ],
                ],
            ],
        ]);
    }else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'siswa_id',
                [
                    'attribute' => 'Nama',
                    'value' => 'siswa.nama'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print} {view}',
                    'buttons'=>[
                        'print' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-print"></span> Print', ['laporan-wali/print', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm', 'target' => '_blank']);
                        },
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['laporan-wali/view', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm']);
                        },
                    ],
                ],
            ],
        ]);
    }
    ?>

</div>
