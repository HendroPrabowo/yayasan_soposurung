<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplMknMalam */

$this->title = 'Create Apel Makan Malam';
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Malam', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-mkn-malam-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'jurnal_laporan_piket' => $jurnal_laporan_piket,
    ]) ?>

</div>
