<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */

$this->title = 'Edit Siswa: ' . $model->nisn;
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nisn, 'url' => ['view', 'id' => $model->nisn]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="siswa-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'kelas' => $kelas,
    ]) ?>

</div>
