<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogTamuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Tamu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-tamu-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Log Tamu', ['create'], ['class' => 'btn btn-success']) ?>
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
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'formatter' => [
                'class' => 'yii\i18n\Formatter',
                'nullDisplay' => '-',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'nama_tamu',
                'tujuan_dan_keperluan:ntext',
//            'waktu_masuk',
                [
                    'attribute' => 'waktu_masuk',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'waktu_keluar',
                [
                    'attribute' => 'waktu_keluar',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'user_id',
                [
                    'attribute' => 'User',
                    'value' => 'user.username'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {keluar}',
                    'buttons'=>[
                        'keluar' => function ($url, $model) {
                            return Html::a('<z style="color: red;"><span class="glyphicon glyphicon-log-out"></span>Keluar</z>', ['log-tamu/keluar', 'id' => $model->id]);
                        },
                    ],
                ],
            ],
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'formatter' => [
                'class' => 'yii\i18n\Formatter',
                'nullDisplay' => '-',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'nama_tamu',
                'tujuan_dan_keperluan:ntext',
//            'waktu_masuk',
                [
                    'attribute' => 'waktu_masuk',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'waktu_keluar',
                [
                    'attribute' => 'waktu_keluar',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'user_id',
                [
                    'attribute' => 'User',
                    'value' => 'user.username'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {keluar}',
                    'buttons'=>[
                        'keluar' => function ($url, $model) {
                            return Html::a('<z style="color: red;"><span class="glyphicon glyphicon-log-out"></span>Keluar</z>', ['log-tamu/keluar', 'id' => $model->id]);
                        },
                    ],
                ],
            ],
        ]);
    }elseif (Yii::$app->user->can('security')){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'formatter' => [
                'class' => 'yii\i18n\Formatter',
                'nullDisplay' => '-',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'nama_tamu',
                'tujuan_dan_keperluan:ntext',
//            'waktu_masuk',
                [
                    'attribute' => 'waktu_masuk',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'waktu_keluar',
                [
                    'attribute' => 'waktu_keluar',
                    'format' => ['date', 'php:d-M-Y H:i:s']
                ],
//            'user_id',
                [
                    'attribute' => 'User',
                    'value' => 'user.username'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {keluar}',
                    'buttons'=>[
                        'keluar' => function ($url, $model) {
                            return Html::a('<z style="color: red;"><span class="glyphicon glyphicon-log-out"></span>Keluar</z>', ['log-tamu/keluar', 'id' => $model->id]);
                        },
                    ],
                ],
            ],
        ]);
    }
    ?>

    <?php

    ?>
</div>
