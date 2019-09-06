<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BulanAngkatan */

$this->title = 'Create Bulan Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Bulan Angkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulan-angkatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
