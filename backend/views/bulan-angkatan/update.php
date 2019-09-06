<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BulanAngkatan */

$this->title = 'Update Data : ' . $model->siswa->nama;
//$this->params['breadcrumbs'][] = ['label' => 'Bulan Angkatans', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bulan-angkatan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
