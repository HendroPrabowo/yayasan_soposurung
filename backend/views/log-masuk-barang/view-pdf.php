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
        <h3>Laporan Masuk Barang</h3>
        <p>Periode : <?= $start ?> s/d <?= $end ?></p>
    </div>

    <table>
        <thead>
        <tr>
            <td style="width: 40px; font-weight: bold;">No.</td>
            <td style="width: 160px; font-weight: bold;">Tanggal</td>
            <td style="width: 120px; font-weight: bold;">Petugas</td>
            <td style="width: 150px; font-weight: bold;">Vendor</td>
            <td style="width: 150px; font-weight: bold;">Barang</td>
            <td style="font-weight: bold;">Keterangan</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($log_barang as $value){
            $tgl = date('d F Y', strtotime($value->tanggal));

            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$tgl.'</td>';
            echo '<td>'.$value->createdBy->username.'</td>';
            echo '<td>'.$value->vendor.'</td>';
            echo '<td>'.$value->nama_barang.'</td>';
            echo '<td>'.$value->keterangan.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
