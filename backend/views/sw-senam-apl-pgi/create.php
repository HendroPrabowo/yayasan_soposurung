<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SwSenamAplPgi */

$this->title = 'Apel Senam Pagi';
$this->params['breadcrumbs'][] = ['label' => 'Siswa Apel Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-apel-pagi-create">

    <h3><?= Html::encode($this->title) ?> Tanggal <b><?= date("d-M-Y", strtotime($jurnal_laporan_piket->tanggal)); ?></b></h3>

    <?= $this->render('_form') ?>

</div>
