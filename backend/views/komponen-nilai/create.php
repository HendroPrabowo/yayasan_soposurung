<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenNilai */

$this->title = 'Create Komponen Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Komponen Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-nilai-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
