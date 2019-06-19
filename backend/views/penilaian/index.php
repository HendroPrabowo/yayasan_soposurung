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

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'kelas_siswa_id',
            [
                'attribute' => 'NISN',
                'value' => 'kelasSiswa.nisn'
            ],
            [
                'attribute' => 'Nama Siswa',
                'value' => 'kelasSiswa.siswa.nama'
            ],
            [
                'attribute' => 'Kelas',
                'value' => 'komponenNilai.kelasMataPelajaran.tahunAjaranKelas.kelas.kelas'
            ],
            [
                'attribute' => 'Komponen Nilai',
                'value' => 'komponenNilai.komponen_nilai'
            ],
            [
                'attribute' => 'Pelajaran',
                'value' => 'komponenNilai.kelasMataPelajaran.mataPelajaran.pelajaran'
            ],
//            'komponen_nilai_id',
            'nilai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
