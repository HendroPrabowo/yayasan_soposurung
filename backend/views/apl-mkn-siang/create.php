<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplMknSiang */

$this->title = 'Create Apl Mkn Siang';
$this->params['breadcrumbs'][] = ['label' => 'Apl Mkn Siangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-mkn-siang-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form') ?>

</div>
