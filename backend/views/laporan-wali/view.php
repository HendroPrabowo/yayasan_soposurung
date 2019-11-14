<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanWali */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Walis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="laporan-wali-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if(!Yii::$app->user->can('supervisor')){
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']).'&nbsp';
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'akademik:ntext',
            'prestasi:ntext',
            'absensi:ntext',
            'catatan:ntext',
            'fisik:ntext',
            'organisasi:ntext',
            'administrasi:ntext',
            'semester_angkatan_id',
            'siswa_id',
        ],
    ]) ?>

</div>
