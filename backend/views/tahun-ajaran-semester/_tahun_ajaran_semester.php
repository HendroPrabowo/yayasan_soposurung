<?php

use yii\helpers\Html;
use yii\grid\GridView;

if(Yii::$app->user->can('supervisor')){
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//            'id',
        'tahun_ajaran',
        'semester',
//        'is_active',
        [
            'attribute' => 'is_active',
            'label' => 'Status Akun',
            'encodeLabel' => false,
            'headerOptions' => ['style'=>'text-align:center'],
            'value' => function(\yii\base\Model $model){
                if($model->is_active == 1){
                    return 'Aktif';
                }else{
                    return 'Tidak Aktif';
                }
            },
            'contentOptions' => function ($model, $key, $index, $column) {
                if($model->is_active == 1){
                    return ['class' => 'label label-success center-block'];
                }else{
                    return ['class' => 'label label-danger center-block'];
                }
            },
        ],
    ],
]);
}else{
    echo Html::a('Tambah Tahun Ajaran Baru', ['create'], ['class' => 'btn btn-success', 'style' => ['margin-top' => '10px']]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'tahun_ajaran',
            'semester',
//        'is_active',
            [
                'attribute' => 'is_active',
                'label' => 'Status Akun',
                'encodeLabel' => false,
                'headerOptions' => ['style'=>'text-align:center'],
                'value' => function(\yii\base\Model $model){
                    if($model->is_active == 1){
                        return 'Aktif';
                    }else{
                        return 'Tidak Aktif';
                    }
                },
                'contentOptions' => function ($model, $key, $index, $column) {
                    if($model->is_active == 1){
                        return ['class' => 'label label-success center-block'];
                    }else{
                        return ['class' => 'label label-danger center-block'];
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {set_active}',
                'buttons' => [
                    'set_active' => function ($url, $model, $key) {
                        if($model->is_active == 0){
                            return Html::a('Aktifkan', ['tahun-ajaran-semester/set-active', 'id' => $model->id]);
                        }
                    },
                ],
            ],
        ],
    ]);
}
?>