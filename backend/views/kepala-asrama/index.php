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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'Username',
                'value' => 'user.username',
            ],
            'nama',
//            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
