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

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->nisn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->nisn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
        ],
    ]) ?>

</div>
