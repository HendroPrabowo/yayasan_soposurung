<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogKeluarBarang */

$this->title = 'Update Log Barang Keluar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keluar-masuk-barang-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
