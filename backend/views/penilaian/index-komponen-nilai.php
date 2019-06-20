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

    <h3>Komponen Nilai <b><?= $kelas_mata_pelajaran->mataPelajaran->pelajaran ?></b> kelas <b><?= $kelas_mata_pelajaran->tahunAjaranKelas->kelas->kelas ?></b></h3>

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
            'komponen_nilai',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{penilaian}',
                'buttons'=>[
                    'penilaian'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> Nilai', ['penilaian/view-penilaian', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
