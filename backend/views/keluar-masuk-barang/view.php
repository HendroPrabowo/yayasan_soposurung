<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KeluarMasukBarang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Keluar Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="keluar-masuk-barang-view">

    <h3><?= Html::encode($this->title) ?></h3>

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
//            'id',
            'nama_barang',
//            'tanggal',
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],
            'vendor',
            'jumlah',
//            'created_by',
            [
                    'attribute' => 'Created By',
                'value' => $model->createdBy->username
            ],
            'keterangan:ntext',
        ],
    ]) ?>

</div>
