<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Penilaian */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-index">

    <h3>Nilai <b><?= $komponen_nilai->komponen_nilai ?></b> Pelajaran <b><?= $komponen_nilai->kelasMataPelajaran->mataPelajaran->pelajaran ?></b> kelas <b><?= $komponen_nilai->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas ?></b></h3>

    <?= Html::a('Back', ['penilaian/view-komponen-nilai', 'id' => $komponen_nilai->kelas_mata_pelajaran_id], ['class' => 'btn btn-primary']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'style' => [
                'width' => '800px',
                'margin-top' => '20px'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                 'attribute' => 'NISN',
                'value' => 'kelasSiswa.nisn'
            ],
            [
                'attribute' => 'Nama',
                'value' => 'kelasSiswa.siswa.nama'
            ],
            'nilai',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{ubah-nilai}',
                'buttons'=>[
                    'ubah-nilai'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> Ubah Nilai', ['penilaian/update', 'id' => $model->id, 'komponen_nilai' => $_GET['id']]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
