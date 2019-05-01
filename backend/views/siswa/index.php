<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Siswa', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Import Excel', ['import-excel'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nisn',
            'nama',
//            'kelas_id',
            [
                'attribute' => 'Kelas',
                'value' => function(\yii\base\Model $model){
                    if($model->kelas_id == null)
                        return '-';
                    else
                        return $model->kelas->kelas;
                }
            ],
//            'kelahiran',
//            'jenis_kelamin',
//            'agama',
            //'status_dalam_keluarga',
            //'anak_ke',
            //'sekolah_asal',
            //'nama_ayah',
            //'nama_ibu',
            //'alamat_orang_tua:ntext',
            //'nomor_telepon_orang_tua',
            //'pekerjaan_ayah',
            //'pekerjaan_ibu',
            //'user_id',
            'kredit_point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
