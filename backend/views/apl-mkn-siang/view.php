<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AplMknSiang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Siang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apl-mkn-siang-view">

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
            'id',
            'kelas',
            'jumlah',
            'hadir',
            'keterangan_tidak_hadir:ntext',
            'jurnal_laporan_id',
        ],
    ]) ?>

</div>
