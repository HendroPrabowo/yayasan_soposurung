<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TahunAjaranSemesterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tahun Ajaran';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tahun-ajaran-semester-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Tahun Ajaran Aktif',
                'content' => $this->render('_tahun_ajaran_semester_aktif', [
                    'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
                ]),
                'active' => true
            ],
            [
                'label' => 'Tahun Ajaran',
                'content' => $this->render('_tahun_ajaran_semester', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
            ],
        ],
    ]);
    ?>

</div>
