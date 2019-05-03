<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AturanAsrama */

$this->title = 'Update Aturan Asrama: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aturan Asrama', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aturan-asrama-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
