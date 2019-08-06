<?php
use yii\widgets\DetailView;
?>

<h3>Data Diri</h3>

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
//            'angkatan_id',
        [
            'attribute' => 'Angkatan',
            'value' => function(yii\base\Model $model){
                if($model->angkatan_id != null){
                    return $model->angkatan->angkatan;
                }
            }
        ],
//            'user_id'
//            'kelas_id'
        'siswa_thn_kls',
        'kredit_point',
    ],
]) ?>