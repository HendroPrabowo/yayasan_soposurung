<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiswaNilai */

$this->title = 'Tambah Nilai Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-nilai-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
