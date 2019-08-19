<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JurnalLaporanPiket */

$this->title = 'Update Jurnal Laporan Piket: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Laporan Pikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurnal-laporan-piket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
