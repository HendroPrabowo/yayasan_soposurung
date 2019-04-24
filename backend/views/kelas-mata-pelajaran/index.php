<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasMataPelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-mata-pelajaran-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kelas Mata Pelajaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tahun_ajaran_kelas_id',
            'mata_pelajaran_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
