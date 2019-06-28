<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SwAplMknPgi */

$this->title = 'Apel Makan Pagi';
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sw-apl-mkn-pgi-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form') ?>

</div>
