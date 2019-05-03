<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AssignGuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-guru-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'kelas_mata_pelajaran_id',
//            'guru_id',
            [
                'attribute' => 'Guru',
                'value' => 'guru.nama'
            ],
            [
                'attribute' => 'Mata Pelajaran',
                'value' => 'kelasMataPelajaran.mataPelajaran.pelajaran'
            ],
            [
                'attribute' => 'Kelas',
                'value' => 'kelasMataPelajaran.tahunAjaranKelas.kelas.kelas'
            ],
            [
                'attribute' => 'Tahun Ajaran',
                'value' => 'kelasMataPelajaran.tahunAjaranKelas.tahunAjaranSemester.tahun_ajaran'
            ],
            [
                'attribute' => 'Semester',
                'value' => 'kelasMataPelajaran.tahunAjaranKelas.tahunAjaranSemester.semester'
            ],
        ],
    ]); ?>
</div>
