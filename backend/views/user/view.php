<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h3><?= Html::encode('Detail : '.$this->title) ?></h3>

    <p>
        <?php
            if(Yii::$app->user->can('admin')){
                echo Html::a('Reset Password', ['reset-password', 'id' => $model->id], ['class' => 'btn btn-warning']);
                echo '&nbsp';
                echo Html::a('Edit Akun', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
                echo '&nbsp';
                echo Html::a('Hapus', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
            }else{
                echo Html::a('Ganti Password', ['ganti-password', 'id' => $model->id], ['class' => 'btn btn-warning']);
            }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
            'role',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            'email:email',
//            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

    <?= Html::a('Data Diri', ['siswa/view', 'id' => $model->siswa->nisn], ['class' => 'btn btn-primary']); ?>

</div>
