<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplSore */

$this->title = 'Apel Sore';
$this->params['breadcrumbs'][] = ['label' => 'Apel Sore', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-sore-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'tahun_ajaran_kelas' => $tahun_ajaran_kelas
    ]) ?>

</div>
