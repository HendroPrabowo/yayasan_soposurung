<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GuruTahunAjaran */

$this->title = 'Update Guru Tahun Ajaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Guru Tahun Ajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-tahun-ajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
