<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JurnalLaporanPiket */

$this->title = 'Tambah Jurnal Laporan Piket';
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Laporan Pikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnal-laporan-piket-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
