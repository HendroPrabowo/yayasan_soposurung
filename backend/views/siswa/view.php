<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

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

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Detail',
                'content' => $this->render('detail', [
                    'model' => $model,
                ]),
                'active' => true
            ],
            [
                'label' => 'Kedisiplinan',
                'content' => $this->render('kedisiplinan', [
                    'dataProvider' => $dataProvider,
                ]),
            ],
        ],
    ]);
    ?>

</div>
