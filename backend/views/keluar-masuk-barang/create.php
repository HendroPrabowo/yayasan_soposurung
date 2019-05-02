<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeluarMasukBarang */

$this->title = 'Create Keluar Masuk Barang';
$this->params['breadcrumbs'][] = ['label' => 'Keluar Masuk Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluar-masuk-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
