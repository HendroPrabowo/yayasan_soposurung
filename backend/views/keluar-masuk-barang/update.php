<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeluarMasukBarang */

$this->title = 'Update Log Keluar Masuk Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Keluar Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keluar-masuk-barang-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
