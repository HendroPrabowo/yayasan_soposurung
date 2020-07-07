<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasMataPelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-mata-pelajaran-index">

    <h3>Mata Pelajaran pada Kelas <strong><?= $tahun_ajaran_kelas->kelas->kelas ?></strong> Semester <strong><?= $tahun_ajaran_kelas->tahunAjaranSemester->semester ?></strong></h3>


        <?= Html::a('Tambah Pelajaran', ['kelas-mata-pelajaran/tambah-mata-pelajaran', 'id' => $tahun_ajaran_kelas->id], ['class' => 'btn btn-primary']); ?>
        <br>
        <br>
        <?=
            GridView::widget([
                'options' => [
                    'style' => [
                        'width' => '700px',
                    ]
                ],
                'dataProvider' => $listDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//                    'tahun_ajaran_kelas_id',
//                    'mata_pelajaran_id',
                    [
                            'attribute' => 'Mata Pelajaran',
                        'value' => 'mataPelajaran.pelajaran'
                    ],
                    [
                        'attribute' => 'Guru Pelajaran',
                        'value' => 'assignGuru.guru.nama'
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:black'],
                        'template' => '{assign} {delete} {komponen-nilai}',
                        'buttons'=>[
                            'assign'=>function ($url, $model) {
                                return Html::a('</&nbsp;><span class="glyphicon glyphicon-user"></span> Assign Guru', ['assign-guru/assign-guru', 'id' => $model->id]);
                            },
                            'delete'=>function ($url, $model) {
                                return Html::a('&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" style="color:red;"></span> <z style="color: red">Delete</z>', ['kelas-mata-pelajaran/delete-kelas-mata-pelajaran', 'id' => $model->id]);
                            },
                            'komponen-nilai'=>function ($url, $model) {
                                return Html::a('&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> Komponen Nilai', ['komponen-nilai/index', 'id' => $model->id]);
                            },
                        ]
                    ],
                ]
            ]);
        ?>
</div>
