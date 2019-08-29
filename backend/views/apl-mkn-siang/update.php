<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AplMknSiang */

$this->title = 'Update Apel Makan Siang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apel Makan Siang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apl-mkn-siang-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'hadir')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'tidak_hadir')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'keterangan_tidak_hadir')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
