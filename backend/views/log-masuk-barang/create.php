<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogMasukBarang */

$this->title = 'Create Log Masuk Barang';
$this->params['breadcrumbs'][] = ['label' => 'Log Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-masuk-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
