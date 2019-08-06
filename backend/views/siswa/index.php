<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

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
        <?= Html::a('Download Template Excel', ['download-excel'], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Angkatan',
                'content' => $this->render('_angkatan', [
                    'semua_angkatan' => $semua_angkatan,
                ]),
                'active' => true
            ],
            [
                'label' => 'Semua Siswa',
                'content' => $this->render('_siswa', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
            ],
        ],
    ]);
    ?>


</div>
