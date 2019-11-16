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
        echo '<div class="row" style="margin-top: 10px">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Print Laporan</b>
                </div>
                <div class="panel-body">
                    <form action="'.\yii\helpers\Url::to(['print-laporan']).'" method="post" target="_blank">
                        <input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->getCsrfToken().'">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="start" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="end" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>';
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
                ],
            ],
        ]);
    }elseif(Yii::$app->user->can('supervisor')){
        echo '<div class="row" style="margin-top: 10px">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Print Laporan</b>
                </div>
                <div class="panel-body">
                    <form action="'.\yii\helpers\Url::to(['print-laporan']).'" method="post" target="_blank">
                        <input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->getCsrfToken().'">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="start" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="end" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>';
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
        echo '<div class="row" style="margin-top: 10px">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Print Laporan</b>
                </div>
                <div class="panel-body">
                    <form action="'.\yii\helpers\Url::to(['print-laporan']).'" method="post" target="_blank">
                        <input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->getCsrfToken().'">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="start" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="end" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>';
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
