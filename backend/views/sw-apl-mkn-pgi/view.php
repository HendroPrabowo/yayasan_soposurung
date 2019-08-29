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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kelas',
            'jumlah',
            'hadir',
            'tidak_hadir',
            'keterangan_tidak_hadir:ntext',
        ],
    ]) ?>

</div>
