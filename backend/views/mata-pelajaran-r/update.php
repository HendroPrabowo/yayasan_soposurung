<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaranR */

$this->title = 'Update Mata Pelajaran: ' . $model->pelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran Rs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mata-pelajaran-r-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
