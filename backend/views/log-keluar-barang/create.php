<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogKeluarBarang */

$this->title = 'Tambah Log Barang Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Log Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluar-masuk-barang-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
