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
        <h3>Laporan Kedisiplinan Asrama Yayasan Soposurung</h3>
        <p>Periode : <?= $start ?> s/d <?= $end ?></p>
    </div>

    <table>
        <thead>
        <tr>
            <th style="width: 40px;">No.</th>
            <th style="width: 40px;">NISN</th>
            <th style="width: 40px;">Siswa</th>
            <th style="width: 40px;">Jenis Pelanggaran</th>
            <th style="width: 40px;">Kredit Point</th>
            <th style="width: 40px;">Keterangan</th>
            <th style="width: 40px;">Tambah Ke Point</th>
            <th style="width: 40px;">Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($kedisiplinan_all as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->siswa_id.'</td>';
            echo '<td>'.$value->siswa->nama.'</td>';
            echo '<td>'.$value->aturanAsrama->jenis_pelanggaran.'</td>';
            echo '<td>'.$value->aturanAsrama->point.'</td>';
            echo '<td>'.$value->keterangan.'</td>';
            if($value->tambah_ke_point == 1){
                echo '<td>Ya</td>';
            }else{
                echo '<td>Tidak</td>';
            };

            echo '<td>'.$value->tanggal.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
