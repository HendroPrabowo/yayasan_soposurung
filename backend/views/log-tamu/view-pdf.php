<?php
$tanggal_kurang = date('Y-m-d', strtotime('-7 days', strtotime($tanggal_awal)));

$start = date('d F Y', strtotime($tanggal_awal));
$end = date('d F Y', strtotime($tanggal_kurang));

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
        <h3>Laporan Log Tamu Asrama Yayasan Soposurung</h3>
        <p>Periode : <?= $start ?> s/d <?= $end ?></p>
    </div>

    <table>
        <thead>
        <tr>
            <td style="width: 40px; font-weight: bold;">No.</td>
            <td style="width: 160px; font-weight: bold;">Nama Tamu</td>
            <td style="font-weight: bold;">Tujuan dan Keperluan</td>
            <td style="width: 160px; font-weight: bold;">Waktu Masuk</td>
            <td style="width: 160px; font-weight: bold;">Waktu Keluar</td>
            <td style="width: 120px; font-weight: bold;">Petugas</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($log_tamu as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->nama_tamu.'</td>';
            echo '<td>'.$value->tujuan_dan_keperluan.'</td>';
            echo '<td>'.$value->waktu_masuk.'</td>';
            echo '<td>'.$value->waktu_keluar.'</td>';
            echo '<td>'.$value->user->username.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
