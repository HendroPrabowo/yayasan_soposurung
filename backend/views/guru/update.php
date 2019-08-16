<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = 'Update Guru: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form') ?>

</div>
