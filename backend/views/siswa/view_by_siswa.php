<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */

$this->title = $model->nisn;
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="siswa-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nisn',
            'nama',
            'kelahiran',
            'jenis_kelamin',
            'agama',
            'status_dalam_keluarga',
            'anak_ke',
            'sekolah_asal',
            'nama_ayah',
            'nama_ibu',
            'alamat_orang_tua:ntext',
            'nomor_telepon_orang_tua',
            'pekerjaan_ayah',
            'pekerjaan_ibu',
//            'user_id'
            [
                'attribute' => 'Angkatan',
                'value' => function(yii\base\Model $model){
                    if($model->angkatan_id != null){
                        return $model->angkatan->angkatan;
                    }
                }
            ],
            'kredit_point',
        ],
    ]) ?>

</div>
