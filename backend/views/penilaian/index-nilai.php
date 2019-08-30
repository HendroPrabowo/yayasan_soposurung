<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Penilaian */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Komponen Nilai', 'url' => ['penilaian/view-komponen-nilai', 'id' => $komponen_nilai->kelas_mata_pelajaran_id]];
$this->params['breadcrumbs'][] = $this->title;

$user = \app\models\User::findOne(Yii::$app->user->id);

?>
<div class="penilaian-index">

    <h3>Nilai <b><?= $komponen_nilai->komponen_nilai ?></b> Pelajaran <b><?= $komponen_nilai->kelasMataPelajaran->mataPelajaran->pelajaran ?></b> kelas <b><?= $komponen_nilai->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas ?></b></h3>

    <?= Html::a('Back', ['penilaian/view-komponen-nilai', 'id' => $komponen_nilai->kelas_mata_pelajaran_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Download Template', ['penilaian/download-template', 'id' => $komponen_nilai->id], ['class' => 'btn btn-warning']) ?>

    <?php
    if($user->role == 'guru'){
        if($komponen_nilai->excel == 0){
            echo Html::a('Upload Nilai', ['penilaian/upload-nilai', 'id' => $komponen_nilai->id], ['class' => 'btn btn-success']);
        }
    }else{
        echo Html::a('Upload Nilai', ['penilaian/upload-nilai', 'id' => $komponen_nilai->id], ['class' => 'btn btn-success']);
    }
    ?>

    <?php
    if(Yii::$app->user->can('admin')){
        echo GridView::widget([
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
        ]);
    }else{
        echo GridView::widget([
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
            ],
        ]);
    }
    ?>
</div>
