<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

//echo '<pre>';
//var_dump($tahun_ajaran_kelas->id);
//echo '</pre>';
//
//die();

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasMataPelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-mata-pelajaran-index">

    <h3>Mata Pelajaran pada Kelas <strong><?= $tahun_ajaran_kelas->kelas->kelas ?></strong> Semester <strong><?= $tahun_ajaran_kelas->tahunAjaranSemester->semester ?></strong></h3>

    <div class="col-md-6">
        <?= Html::a('Tambah Pelajaran', ['kelas-mata-pelajaran/tambah-mata-pelajaran', 'id' => $tahun_ajaran_kelas->id], ['class' => 'btn btn-primary']); ?>
        <br>
        <br>
        <?=
            GridView::widget([
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
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:black'],
                        'template' => '{assign} {delete}',
                        'buttons'=>[
                            'assign'=>function ($url, $model) {
                                return Html::a('</&nbsp;><span class="glyphicon glyphicon-user"></span> Assign Guru', ['kelas-mata-pelajaran/assign-guru', 'id' => $model->id]);
                            },
                            'delete'=>function ($url, $model) {
                                return Html::a('&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" style="color:red;"></span> <z style="color: red">Delete</z>', ['#']);
                            },
                        ]
                    ],
                ]
            ]);
        ?>
    </div>
</div>
