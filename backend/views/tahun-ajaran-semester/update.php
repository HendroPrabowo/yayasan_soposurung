<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaranSemester */

$this->title = 'Edit Tahun Ajaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="tahun-ajaran-semester-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
