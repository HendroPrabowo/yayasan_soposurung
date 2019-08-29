<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KepalaAsrama */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kepala Asrama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kepala-asrama-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
//            'user_id',
            [
                'attribute' => 'Username',
                'value' => $model->user->username,
            ],
        ],
    ]) ?>

</div>
