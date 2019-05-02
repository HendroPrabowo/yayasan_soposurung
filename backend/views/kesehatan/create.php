<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kesehatan */

$this->title = 'Tambah Laporan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesehatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'siswa' => $siswa,
    ]) ?>

</div>
