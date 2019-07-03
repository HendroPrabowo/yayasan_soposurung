<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplMalam */

$this->title = 'Update Apel Malam: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Malam', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apl-malam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
