<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplPgiKelas */

$this->title = 'Apel Pagi Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Apel Pagi Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apl-pgi-kelas-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'tahun_ajaran_kelas' => $tahun_ajaran_kelas
    ]) ?>

</div>
