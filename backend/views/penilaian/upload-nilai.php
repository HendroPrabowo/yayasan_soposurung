<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Upload Nilai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'excel')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
