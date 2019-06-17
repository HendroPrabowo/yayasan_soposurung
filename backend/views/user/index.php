<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Akun', ['user/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'role',
//            'is_active',
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

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {status}',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span> Detail', ['user/view', 'id' => $model->id]);
                    },
                    'status'=>function ($url, $model) {
                        if($model->is_active == 0){
                            return Html::a('<span class="glyphicon glyphicon-ok-sign" style="color:green;"></span> Aktifkan', ['user/aktifkan-akun', 'id' => $model->id]);
                        }else{
                            return Html::a('<span class="glyphicon glyphicon-remove-sign" style="color: red"></span> Non-Aktifkan', ['user/nonaktifkan-akun', 'id' => $model->id]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>
</div>
