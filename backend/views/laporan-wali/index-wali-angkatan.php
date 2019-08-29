<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporanWaliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Wali';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-wali-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Angkatan</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($semester_angkatan as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->angkatan->angkatan.'</td>';
            echo '<td>'.$value->tahunAjaranSemester->tahun_ajaran.'</td>';
            echo '<td>'.$value->tahunAjaranSemester->semester.'</td>';
            echo '<td>'.Html::a('Laporan', ['laporan-wali/index-laporan', 'id' => $value->id], ['class' => 'btn btn-primary btn-sm']).'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

</div>
