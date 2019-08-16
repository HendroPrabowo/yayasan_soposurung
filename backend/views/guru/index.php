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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'no_induk_guru',
            'username',
            'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
