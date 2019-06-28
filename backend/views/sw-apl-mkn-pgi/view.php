<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SwAplMknPgi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sw-apl-mkn-pgi-view">

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
            'kelas',
            'jumlah',
            'hadir',
            'tidak_hadir',
            'keterangan_tidak_hadir:ntext',
            'jurnal_laporan_piket_id',
        ],
    ]) ?>

</div>
