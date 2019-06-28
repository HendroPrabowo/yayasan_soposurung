<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SwAplMknPgi */

$this->title = 'Update Apel Makan Pagi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sw-apl-mkn-pgi-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
