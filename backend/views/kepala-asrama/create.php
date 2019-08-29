<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KepalaAsrama */

$this->title = 'Tambah Kepala Asrama';
$this->params['breadcrumbs'][] = ['label' => 'Kepala Asrama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepala-asrama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
