<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AssignGuru */

$this->title = 'Update Assign Guru: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assign-guru-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
