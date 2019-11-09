<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AturanAsramaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aturan Asrama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aturan-asrama-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(!Yii::$app->user->can('supervisor')){
            echo Html::a('Tambah Aturan Asrama', ['create'], ['class' => 'btn btn-success']). '&nbsp';
            if(!Yii::$app->user->can('pengawas')){
                echo Html::a('Import Excel', ['import-excel'], ['class' => 'btn btn-primary']).'&nbsp';
                echo Html::a('Download Template Excel', ['download-excel'], ['class' => 'btn btn-warning']);
            }
        }
        ?>
    </p>

    <?php

    if(Yii::$app->user->can('pengawas')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'jenis_pelanggaran',
                'point',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                ],
            ],
        ]);
    }elseif(Yii::$app->user->can('supervisor')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'jenis_pelanggaran',
                'point',
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
                'jenis_pelanggaran',
                'point',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>
</div>
