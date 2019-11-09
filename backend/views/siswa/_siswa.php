<?php

use yii\grid\GridView;

?>

<?php
if(Yii::$app->user->can('supervisor')){
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nisn',
            'nama',
            'kredit_point',
            [
                'attribute' => 'Angkatan',
                'value' => 'angkatan.angkatan',
            ],
        ],
    ]);
	}else{
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nisn',
            'nama',
            'kredit_point',
            [
                'attribute' => 'Angkatan',
                'value' => 'angkatan.angkatan',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
	}
?>