<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KelasSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Siswa';
$this->params['breadcrumbs'][] = $this->title;
$id_kelas_siswa = $_GET['id'];

?>
<div class="kelas-siswa-index">

    <h3>List Siswa Kelas <b><?= $tahun_ajaran_kelas->kelas->kelas ?></b></h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Angkatan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($kelas_siswa as $value){
            echo '<tr><td>'.$no.'</td><td>'.$value->nisn.'</td><td>'.$value->siswa->nama.'</td><td>'.$value->siswa->angkatan->angkatan.'</td><td>'.
                Html::a('', ['hapus-siswa', 'id' => $value->id, 'id_kelas_siswa' => $id_kelas_siswa], [
                        'class' => 'glyphicon glyphicon-trash',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ]
                    ]
                )
                .'</td></tr>';
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>
