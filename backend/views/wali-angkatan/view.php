<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WaliAngkatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wali Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wali-angkatan-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'attribute' => 'Username',
                'value' => $model->user->username,
            ],
            'nama',
//            'user_id',
        ],
    ]) ?>

</div>
