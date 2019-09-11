<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulan-angkatan-index">
    <h3>List Pembayaran Angkatan <?= $bulan_angkatan->angkatan->angkatan ?>, Bulan : <?= $bulan_angkatan->semesterBulan->bulan ?></h3>

    <?= Html::a('<span class="glyphicon glyphicon-cloud-download"></span> Download Template', ['bulan-angkatan/download-template', 'id' => $bulan_angkatan->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-cloud-upload"></span> Upload Template', ['bulan-angkatan/upload-template', 'id' => $bulan_angkatan->id], ['class' => 'btn btn-success']) ?>

    <table id="example" class="table table-bordered table-bordered table-hover">
        <thead>
        <th>No</th>
        <th>NISM</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Kode Briva</th>
        <th>Jumlah Disetor</th>
        <th>Lunas</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($bulan_siswa as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->siswa_id.'</td>';
            echo '<td>'.$value->siswa->nama.'</td>';
            echo '<td>'.$value->tanggal.'</td>';
            echo '<td>'.$value->kode_briva.'</td>';
            echo '<td>'.$value->jumlah_disetor.'</td>';
            if($value->lunas == 1){
                echo '<td>Lunas</td>';
            }else{
                echo '<td>Belum Lunas</td>';
            }
            echo '<td><a href="update/?id='.$value->id.'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

</div>
