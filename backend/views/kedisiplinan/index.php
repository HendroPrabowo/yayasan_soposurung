<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KedisiplinanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kedisiplinan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kedisiplinan-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <p>
        <?php
        if(!Yii::$app->user->can('supervisor')){
            echo Html::a('Tambah Pelanggaran', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php
    if(Yii::$app->user->can('pengawas')){
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
        echo '<table class="table-responsive">';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'siswa_id',
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                [
                    'attribute' => 'Jenis Pelanggaran',
                    'value' => 'aturanAsrama.jenis_pelanggaran'
                ],
                [
                    'attribute' => 'Kredit Point',
                    'value' => 'aturanAsrama.point'
                ],
//            'aturan_asrama_id',
                'keterangan:ntext',
                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
//            'tambah_ke_point',
                [
                    'attribute' => 'Tambah Point',
                    'value' => function(\yii\base\Model $model){
                        if($model->tambah_ke_point == 0){
                            return "Tidak";
                        }else if($model->tambah_ke_point == 1){
                            return "Ya";
                        }else{
                            return "-----";
                        }
                    },
                    'contentOptions' => function ($model, $key, $index, $column) {
                        if($model->tambah_ke_point == 3){
                            return ['class' => 'label label-danger center-block'];
                        }else{
                            return ['class' => 'label label-success center-block'];
                        }
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}'
                ],
            ],
        ]);
        echo '</table>';
    }elseif(Yii::$app->user->can('wakepas kesiswaan')){
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
        echo '<table class="table-responsive">';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'siswa_id',
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                [
                    'attribute' => 'Jenis Pelanggaran',
                    'value' => 'aturanAsrama.jenis_pelanggaran'
                ],
                [
                    'attribute' => 'Kredit Point',
                    'value' => 'aturanAsrama.point'
                ],
//            'aturan_asrama_id',
                'keterangan:ntext',
                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
//            'tambah_ke_point',
                [
                    'attribute' => 'Tambah Point',
                    'value' => function(\yii\base\Model $model){
                        if($model->tambah_ke_point == 0){
                            return "Tidak";
                        }else if($model->tambah_ke_point == 1){
                            return "Ya";
                        }else{
                            return "-----";
                        }
                    },
                    'contentOptions' => function ($model, $key, $index, $column) {
                        if($model->tambah_ke_point == 3){
                            return ['class' => 'label label-danger center-block'];
                        }else{
                            return ['class' => 'label label-success center-block'];
                        }
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}'
                ],
            ],
        ]);
        echo '</table>';
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
        echo '<table class="table-responsive">';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'siswa_id',
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                [
                    'attribute' => 'Jenis Pelanggaran',
                    'value' => 'aturanAsrama.jenis_pelanggaran'
                ],
                [
                    'attribute' => 'Kredit Point',
                    'value' => 'aturanAsrama.point'
                ],
//            'aturan_asrama_id',
                'keterangan:ntext',
                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
//            'tambah_ke_point',
                [
                    'attribute' => 'Tambah Point',
                    'value' => function(\yii\base\Model $model){
                        if($model->tambah_ke_point == 0){
                            return "Tidak";
                        }else if($model->tambah_ke_point == 1){
                            return "Ya";
                        }else{
                            return "-----";
                        }
                    },
                    'contentOptions' => function ($model, $key, $index, $column) {
                        if($model->tambah_ke_point == 3){
                            return ['class' => 'label label-danger center-block'];
                        }else{
                            return ['class' => 'label label-success center-block'];
                        }
                    },
                ],
            ],
        ]);
        echo '</table>';
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
        echo '<table class="table-responsive">';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'siswa',
                    'value' => 'siswa.nama'
                ],
                [
                    'attribute' => 'Jenis Pelanggaran',
                    'value' => 'aturanAsrama.jenis_pelanggaran'
                ],
                [
                    'attribute' => 'Kredit Point',
                    'value' => 'aturanAsrama.point'
                ],
                'keterangan:ntext',
                [
                    'attribute' => 'tanggal',
                    'format' => ['date', 'php:d-M-Y']
                ],
                [
                    'attribute' => 'Tambah Point',
                    'value' => function(\yii\base\Model $model){
                        if($model->tambah_ke_point == 0){
                            return "Tidak";
                        }else if($model->tambah_ke_point == 1){
                            return "Ya";
                        }else{
                            return "-----";
                        }
                    },
                    'contentOptions' => function ($model, $key, $index, $column) {
                        if($model->tambah_ke_point == 3){
                            return ['class' => 'label label-danger center-block'];
                        }else{
                            return ['class' => 'label label-success center-block'];
                        }
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        echo '</table>';
    }
    ?>
</div>
