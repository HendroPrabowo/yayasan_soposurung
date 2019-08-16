<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Penilaian */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['penilaian/index']];
$this->params['breadcrumbs'][] = $tahun_ajaran_kelas->kelas->kelas;
?>
<div class="penilaian-index">

    <h3>Mata Pelajaran Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas ?></b></h3>

    <?php
    if(count($kelas_mata_pelajaran) == 0){
        echo  '<p>Mata Belum Di Assign Ke Kelas Ini</p>';
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'style' => [
                'width' => '500px',
                'margin-top' => '20px'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Pelajaran',
                'value' => 'mataPelajaran.pelajaran'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{komponen-nilai}',
                'buttons'=>[
                    'komponen-nilai'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span> Komponen Nilai', ['penilaian/view-komponen-nilai', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
