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

    <?php
    if(!Yii::$app->user->can('supervisor')){
        echo '<div class="panel panel-primary">';
        echo '<div class="panel-heading">Assign Angkatan</div>';
        echo '<div class="panel-body">';
        echo '<form action="create?id='.$semester_bulan->id.'" method="post">';
        echo '<input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->getCsrfToken().'">';
        echo '<div class="form-group">';
        echo '<label>Angkatan</label>';
        echo '<select name="angkatan" class="form-control" required>';
        echo '<option value="">Pilih Satu</option>';
            foreach ($angkatan as $value){
                echo '<option value="'.$value->id.'">'.$value->angkatan.'</option>';
            }
        echo '</select>';
        echo '</div>';
        echo '<button class="btn btn-success" type="submit">Tambah Angkatan</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    ?>

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
