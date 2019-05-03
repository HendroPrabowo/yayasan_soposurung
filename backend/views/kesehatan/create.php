<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kesehatan */

$this->title = 'Tambah Laporan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesehatan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'siswa' => $siswa,
    ]) ?>

</div>
