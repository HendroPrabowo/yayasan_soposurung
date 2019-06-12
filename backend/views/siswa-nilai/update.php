<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiswaNilai */

$this->title = 'Update Nilai Siswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nilai Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="siswa-nilai-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
