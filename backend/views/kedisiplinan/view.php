<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */

$this->title = 'Pelanggaran';
$this->params['breadcrumbs'][] = ['label' => 'Kedisiplinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kedisiplinan-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
//            'id',
//            'siswa_id',
            [
                    'attribute' => 'siswa',
                'value' => $model->siswa->nama
            ],
            [
                'attribute' => 'Jenis Pelanggaran',
                'value' => $model->aturanAsrama->jenis_pelanggaran
            ],
            [
                'attribute' => 'Point',
                'value' => $model->aturanAsrama->point
            ],
            'aturan_asrama_id',
            'keterangan:ntext',
//            'tambah_ke_point',
            [
                    'attribute' => 'Tambah Point',
                'value' => function($model){
                    if($model->tambah_ke_point == 0){
                        return "Tidak";
                    }else{
                        return "Ya";
                    }
                }
            ],
        ],
    ]) ?>

</div>
