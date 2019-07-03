<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplMknSiang */

$this->title = 'Update Apel Makan Siang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Siang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apl-mkn-siang-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
