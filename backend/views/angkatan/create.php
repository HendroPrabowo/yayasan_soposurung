<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Angkatan */

$this->title = 'Tambah Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Angkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angkatan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
