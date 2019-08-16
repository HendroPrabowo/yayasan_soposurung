<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <form method="post">
        <input type='hidden' name='<?= Yii::$app->request->csrfParam ?>' value='<?= Yii::$app->request->getCsrfToken()?>'>
        <div class="form-group">
            <label>No Induk Guru</label>
            <input type="text" class="form-control" value="<?= $model->no_induk_guru ?>" name="no_induk_guru">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" value="<?= $model->nama ?>" name="nama">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

</div>
