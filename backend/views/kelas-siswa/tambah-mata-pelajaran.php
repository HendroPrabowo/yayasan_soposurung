<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-siswa-index">

    <h3>Mata Pelajaran pada kelas <?= $tahun_ajaran_kelas->kelas->kelas ?> belum di Assign</h3>
    <?= Html::a('Assign Mata Pelajaran', ['kelas-mata-pelajaran/tambah-mata-pelajaran', 'id' => $tahun_ajaran_kelas->id], ['style' => [
            'font-size' => '18px'
        ]]) ?>

</div>
