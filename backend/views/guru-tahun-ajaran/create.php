<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GuruTahunAjaran */

$this->title = 'Create Guru Tahun Ajaran';
$this->params['breadcrumbs'][] = ['label' => 'Guru Tahun Ajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-tahun-ajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
