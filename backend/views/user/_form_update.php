<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Edit Akun: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Semua User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';

$jenis_role = \yii\helpers\ArrayHelper::map($role, 'name', 'name');

?>

<div class="user-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'role')->dropDownList($jenis_role) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>



</div>
