<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kesehatan */

$this->title = 'Update Laporan Kesehatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kesehatan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'siswa' => $siswa,
    ]) ?>

</div>
