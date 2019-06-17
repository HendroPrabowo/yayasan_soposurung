<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogTamu */

$this->title = 'Tambah Log Tamu';
$this->params['breadcrumbs'][] = ['label' => 'Log Tamu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-tamu-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
