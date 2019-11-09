<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->title = 'Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php
        if(!Yii::$app->user->can('supervisor')){
            echo Html::a('Tambah Siswa', ['create'], ['class' => 'btn btn-success']) . '&nbsp';
            echo Html::a('Import Excel', ['import-excel'], ['class' => 'btn btn-primary']) . '&nbsp';
            echo Html::a('Download Template Excel', ['download-excel'], ['class' => 'btn btn-warning']) . '&nbsp';
        }
        ?>
    </p>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Semua Siswa',
                'content' => $this->render('_siswa', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'active' => true
            ],
            [
                'label' => 'Angkatan',
                'content' => $this->render('_angkatan', [
                    'semua_angkatan' => $semua_angkatan,
                ]),
            ],
        ],
    ]);
    ?>


</div>
