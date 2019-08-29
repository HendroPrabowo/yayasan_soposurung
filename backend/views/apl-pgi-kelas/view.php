<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AplPgiKelas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apl-pgi-kelas-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Kelas',
                'value' => $model->tahunAjaranKelas->kelas->kelas
            ],
            'jumlah',
            'hadir',
            'tidak_hadir',
            'keterangan_tidak_hadir:ntext',
            'jurnal_laporan_id',
        ],
    ]) ?>

</div>
