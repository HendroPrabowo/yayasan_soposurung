<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplMalam */

$this->title = 'Create Apel Malam';
$this->params['breadcrumbs'][] = ['label' => 'Apel Malam', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-malam-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'tahun_ajaran_kelas' => $tahun_ajaran_kelas
    ]) ?>

</div>
