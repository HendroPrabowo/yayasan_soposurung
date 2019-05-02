<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AssignGuru */

$this->title = 'Create Assign Guru';
$this->params['breadcrumbs'][] = ['label' => 'Assign Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-guru-create">

    <?= $this->render('_form', [
        'model' => $model,
        'guru' => $guru,
        'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
    ]) ?>

</div>
