<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */

$this->title = 'Tambah Pelanggaran';
$this->params['breadcrumbs'][] = ['label' => 'Kedisiplinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kedisiplinan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'siswa' => $siswa,
        'aturan_asrama' => $aturan_asrama,
    ]) ?>

</div>
