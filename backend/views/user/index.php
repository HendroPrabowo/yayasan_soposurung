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

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span> Detail', ['user/view', 'id' => $model->id]);
                    },
                    'update'=>function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['user/update', 'id' => $model->id]);
                    },
                ],],
        ],
    ]); ?>
</div>
