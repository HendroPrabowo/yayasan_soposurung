<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KepalaAsramaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kepala Asrama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepala-asrama-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    if(Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Username',
                    'value' => 'user.username',
                ],
                'nama',
            ],
        ]);
	}else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Username',
                    'value' => 'user.username',
                ],
                'nama',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
	}
    ?>
</div>
