<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogMasukBarang */

$this->title = 'Tambah Log Barang Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Log Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-masuk-barang-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
