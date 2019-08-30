<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kedisiplinan */

$this->title = 'Tambah Pelanggaran';
$this->params['breadcrumbs'][] = ['label' => 'Kedisiplinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kedisiplinan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    if(Yii::$app->user->can('admin') || Yii::$app->user->can('wakepas kesiswaan')){
        echo $this->render('_form', [
            'model' => $model,
            'siswa' => $siswa,
            'aturan_asrama' => $aturan_asrama,
        ]);
    }elseif(Yii::$app->user->can('pengawas')){
        echo $this->render('_form_pengawas', [
            'model' => $model,
            'siswa' => $siswa,
            'aturan_asrama' => $aturan_asrama,
        ]);
    }
    ?>

</div>
