<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeluarMasukBarang */

$this->title = 'Tambah Keluar Masuk Barang';
$this->params['breadcrumbs'][] = ['label' => 'Keluar Masuk Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluar-masuk-barang-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
