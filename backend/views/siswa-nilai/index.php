<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SiswaNilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-nilai-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Nilai Siswa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'kelas_siswa_id',
            [
                'attribute' => "NISN",
                'value' => 'kelasSiswa.nisn'
            ],
            [
                'attribute' => "Nama",
                'value' => 'kelasSiswa.siswa.nama'
            ],
//            'kelas_mata_pelajaran_id',
            [
                'attribute' => "Pelajaran",
                'value' => 'kelasMataPelajaran.mataPelajaran.pelajaran'
            ],
            [
                'attribute' => "Kelas",
                'value' => 'kelasSiswa.thnAjaranKelas.kelas.kelas'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
