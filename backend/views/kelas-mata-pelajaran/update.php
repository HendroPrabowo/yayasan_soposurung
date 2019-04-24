<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelasMataPelajaran */

$this->title = 'Update Kelas Mata Pelajaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kelas Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelas-mata-pelajaran-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
