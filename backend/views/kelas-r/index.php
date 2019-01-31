<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasRSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-r-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'kelas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
