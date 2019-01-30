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

    <?php
        if($model->is_active == 1){
            echo '<div class="info-box">
                    <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-ok-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number" style="margin-top: 29px">Akun Aktif</span>
                    </div>
                </div>';
        }else{
            echo '<div class="info-box">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number" style="margin-top: 29px">Akun Tidak Aktif</span>
                    </div>
                </div>';
        }
    ?>

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
                echo '&nbsp';
            }else{
                echo Html::a('Ganti Password', ['ganti-password', 'id' => $model->id], ['class' => 'btn btn-warning']);
                echo '&nbsp';
            }

            if($model->is_active == 0){
                echo Html::a('Aktifkan Akun', ['user/aktifkan-akun', 'id' => $model->id], ['class' => 'btn btn-success']);
            }else{
                echo Html::a('Non-Aktifkan Akun', ['user/nonaktifkan-akun', 'id' => $model->id], ['class' => 'btn btn-danger']);
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

    <?php
        if($model->role == 'siswa'){
            echo Html::a('Data Diri Siswa', ['siswa/view', 'id' => $model->username], ['class' => 'btn btn-primary']);
        }
    ?>

</div>
