<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SwSenamAplPgi */

$this->title = 'Update Siswa Apel Pagi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Siswa Apel Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="siswa-apel-pagi-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
