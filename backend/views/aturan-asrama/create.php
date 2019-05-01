<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AturanAsrama */

$this->title = 'Tambah Aturan Asrama';
$this->params['breadcrumbs'][] = ['label' => 'Aturan Asrama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aturan-asrama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
