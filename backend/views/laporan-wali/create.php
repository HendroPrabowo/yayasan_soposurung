<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanWali */

$this->title = 'Tambah Laporan Wali Semester Ini';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Wali', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-wali-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_semester_angkatan', [
        'semester_angkatan' => $semester_angkatan,
        'angkatan' => $angkatan,
    ]) ?>

</div>
