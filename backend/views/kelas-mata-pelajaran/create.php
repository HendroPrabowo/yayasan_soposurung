<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelasMataPelajaran */

$this->title = 'Create Kelas Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Kelas Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-mata-pelajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
