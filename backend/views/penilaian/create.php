<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Create Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
