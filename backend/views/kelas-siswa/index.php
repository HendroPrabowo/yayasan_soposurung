<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-siswa-index">

    <?php
    if($dataProvider == null){
        echo '<h3>Belum ada tahun ajaran aktif, silahkan tambah tahun ajaran terlebih dahulu</h3>';
    }else{
        echo '<h3>List Kelas Tahun Ajaran <b>'.$tahun_ajaran_semester_aktif->tahun_ajaran.'</b> Semester <b>'.$tahun_ajaran_semester_aktif->semester.'</b></h3>
    <br>';

        echo GridView::widget([
            'options' => [
                'style' => [
                    'width' => '500px',
                ]
            ],
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'tahun_ajaran_semester_id',
//            'kelas_id',
                [
                    'attribute' => 'Kelas',
                    'value' => 'kelas.kelas'
                ],
                [
                    'attribute' => 'Jumlah Siswa',
                    'value' => 'jumlahSiswa'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:black'],
                    'template' => '{assign} {view}',
                    'buttons'=>[
                        'assign'=>function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-asterisk"></span> Assign Siswa', ['kelas-siswa/assign-siswa', 'id' => $model->id]);
                        },
                        'view'=>function ($url, $model) {
                            return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span> View Siswa', ['kelas-siswa/view-siswa', 'id' => $model->id]);
                        },
                    ]
                ],
            ]
        ]);
    }
    ?>

</div>
