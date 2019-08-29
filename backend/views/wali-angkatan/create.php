<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WaliAngkatan */

$this->title = 'Create Wali Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Wali Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="wali-angkatan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
