<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SwSenamAplPgi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Senam Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="siswa-apel-pagi-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kelas',
            'jumlah',
            'hadir',
            'tidak_hadir',
            'keterangan_tidak_hadir',
        ],
    ]) ?>

</div>
