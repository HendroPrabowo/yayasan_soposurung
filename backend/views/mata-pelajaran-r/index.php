<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MataPelajaranRSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-r-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    if(!Yii::$app->user->can('supervisor')){
        echo Html::a('Tambah Mata Pelajaran', ['create'], ['class' => 'btn btn-success']);
    }
    ?>

    <?php
    if(Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'pelajaran',
            ],
        ]);
	}else{
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'pelajaran',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
	}
    ?>
</div>
