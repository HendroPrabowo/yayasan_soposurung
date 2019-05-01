<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */

$this->title = 'Update Kedisiplinan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kedisiplinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kedisiplinan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
