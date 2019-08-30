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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pelanggaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    if(Yii::$app->user->can('pengawas')){
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
    }elseif(Yii::$app->user->can('wakepas kesiswaan')){
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
    }
    else{
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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>
</div>
