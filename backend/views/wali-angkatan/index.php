<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\WaliAngkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wali Angkatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wali-angkatan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'options' => [
            'style' => [
                'width' => '500px',
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'Username',
                'value' => 'user.username',
            ],
            'nama',
//            'user_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
