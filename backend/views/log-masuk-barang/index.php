<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogMasukBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Barang Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-masuk-barang-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Log Barang Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    if(Yii::$app->user->can('admin')){
        echo '<div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Print Laporan</b>
                </div>
                <div class="panel-body">
                    <form action="'.\yii\helpers\Url::to(['print-laporan']).'" method="post" target="_blank">
                        <input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->getCsrfToken().'">
                        <div class="form-group">
                            <label>Masukkan Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nama_barang',

            'vendor',
            'jumlah',
//            'created_by',
            [
                'attribute' => 'Created',
                'value' => 'createdBy.username'
            ],
//            'tanggal',
            [
                'attribute' => 'tanggal',
                'format' => ['date', 'php:d-M-Y']
            ],
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
