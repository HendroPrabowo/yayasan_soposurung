<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Angkatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="angkatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'angkatan',
            [
                'attribute' => 'Wali Angkatan',
                'value' => function($model){
                    if($model->waliAngkatan == null){
                        return '';
                    }else{
                        return $model->waliAngkatan->nama;
                    }
                }
            ]
        ],
    ]) ?>

</div>
