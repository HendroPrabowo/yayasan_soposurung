<?php
$start = date('d F Y', strtotime($start));
$end = date('d F Y', strtotime($end));
?>

<style>
    .center{
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, th, td {
        border: 1px solid black;
    }
</style>

<div class="log-masuk-barang-view">
    <div class="center">
        <h3>Laporan Kesehatan Asrama Yayasan Soposurung</h3>
        <p>Periode : <?= $start ?> s/d <?= $end ?></p>
    </div>

    <table>
        <thead>
        <tr>
            <th style="width: 40px;">No.</th>
            <th style="width: 40px;">NISN</th>
            <th style="width: 40px;">Siswa</th>
            <th style="width: 40px;">Penyakit</th>
            <th style="width: 40px;">Keterangan</th>
            <th style="width: 40px;">Semester</th>
            <th style="width: 40px;">Created By</th>
            <th style="width: 40px;">Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($kesehatan_all as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->siswa_id.'</td>';
            echo '<td>'.$value->siswa->nama.'</td>';
            echo '<td>'.$value->penyakit.'</td>';
            echo '<td>'.$value->keterangan.'</td>';
            echo '<td>'.$value->tahunAjaranSemester->semester.'</td>';
            echo '<td>'.$value->created_by.'</td>';
            echo '<td>'.$value->tanggal.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
