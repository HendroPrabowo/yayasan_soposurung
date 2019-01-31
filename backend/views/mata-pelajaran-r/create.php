<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaranR */

$this->title = 'Tambah Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-r-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
