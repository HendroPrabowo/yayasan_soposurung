<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BulanAngkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$listData = ArrayHelper::map($angkatan, 'id', 'angkatan');


$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulan-angkatan-index">

    <h3>Pembayaran Bulan : <?= $semester_bulan->bulan ?> <b><?= $semester_bulan->tahunAjaranSemester->tahun_ajaran ?></b> Semester : <?= $semester_bulan->tahunAjaranSemester->semester ?></h3>

    <div class="panel panel-primary">
        <div class="panel-heading">Assign Angkatan</div>
        <div class="panel-body">
            <form action="create?id=<?= $semester_bulan->id ?>" method="post">
                <input type='hidden' name='<?= Yii::$app->request->csrfParam ?>' value='<?= Yii::$app->request->getCsrfToken()?>'>
                <div class="form-group">
                    <label>Angkatan</label>
                    <select name="angkatan" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                        foreach ($angkatan as $value){
                            echo '<option value="'.$value->id.'">'.$value->angkatan.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Tambah Angkatan</button>
            </form>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'style' => [
                'width' => '350px',
                'margin-top' => '20px'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'angkatan_id',
            [
                'attribute' => 'Angkatan',
                'value' => 'angkatan.angkatan'
            ],
//            'semester_bulan_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons'=>[
                    'view' => function ($url, $model) {
                        return Html::a('View Siswa', ['bulan-angkatan/index-angkatan', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
