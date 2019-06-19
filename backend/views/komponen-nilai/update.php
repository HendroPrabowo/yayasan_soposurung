<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenNilai */

$this->title = 'Update Komponen Nilai: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Komponen Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komponen-nilai-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
