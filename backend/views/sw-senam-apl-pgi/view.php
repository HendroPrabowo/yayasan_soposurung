<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SwSenamAplPgi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Siswa Apel Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="siswa-apel-pagi-view">

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
            'tidak_hadir',
            'keterangan_tidak_hadir',
            'waktu',
            'jurnal_laporan_piket_id',
        ],
    ]) ?>

</div>
