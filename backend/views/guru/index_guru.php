<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajaran Yang Diampu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-bordered table-striped" style="width: 500px; margin-top: 20px">
        <thead>
        <tr>
            <th>#</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($assign_guru_terpilih as $value){
            echo '<tr><td>'.$no.'</td><td>'.$value->kelasMataPelajaran->mataPelajaran->pelajaran.'</td><td>'.$value->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas.'</td><td>'.Html::a('Penilaian', ['penilaian/view-komponen-nilai', 'id' => $value->kelasMataPelajaran->id], ['class' => 'btn btn-primary btn-sm']).'</td></tr>';
            $no++;
        }
        ?>
        </tbody>
    </table>

</div>
