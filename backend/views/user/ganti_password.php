<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$this->title = 'Ganti Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'password_lama')->widget(PasswordInput::classname(), [
                'pluginOptions' => [
                    'showMeter' => false,
                    'toggleMask' => true,
                    'toggleTitle' => "Show/Hide Password",
                ]
            ]) ?>

                <?= $form->field($model, 'password_baru')->widget(PasswordInput::classname(), [
                    'pluginOptions' => [
                        'showMeter' => false,
                        'toggleMask' => true,
                        'toggleTitle' => "Show/Hide Password",
                    ]
                ]) ?>

                <?= $form->field($model, 'password_konfirmasi')->widget(PasswordInput::classname(), [
                    'pluginOptions' => [
                        'showMeter' => false,
                        'toggleMask' => true,
                        'toggleTitle' => "Show/Hide Password",
                    ]
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Ganti Password', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
