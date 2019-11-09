<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    if(Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'no_induk_guru',
                'username',
                'nama',
            ],
        ]);
    }else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'no_induk_guru',
                'username',
                'nama',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                ],
            ],
        ]);
    }
    ?>
</div>
