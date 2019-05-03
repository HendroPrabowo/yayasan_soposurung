<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelasSiswa */

$this->title = 'Assign Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Kelas Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-siswa-create">

    <h3><?= Html::encode($this->title) ?> ke Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas; ?></b></h3>

    <?= $this->render('_form', [
        'siswa' => $siswa,
        'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
        'model' => $model,
        'angkatan' => $angkatan,
    ]) ?>

</div>
