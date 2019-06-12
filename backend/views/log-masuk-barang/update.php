<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogMasukBarang */

$this->title = 'Update Log Masuk Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-masuk-barang-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
