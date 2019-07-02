<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplPgiKelas */

$this->title = 'Apel Pagi Kelas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Pagi Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apl-pgi-kelas-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
