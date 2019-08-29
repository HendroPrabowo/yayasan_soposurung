<?php
$this->title = 'View Jurnal Laporan Piket: ' . $model->tanggal;
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Laporan Piket', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View';
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

<div class="jurnal-laporan-piket-view">

    <h3 class="center">Jurnal Laporan Piket Siswa/I Asrama Yayasan Soposurung</h3>

    <p>Tanggal = <?= $model->tanggal ?></p>
    <p>Piket 1 = <?= $model->piket1 ?></p>
    <p>Piket 2 = <?= $model->piket2 ?></p>
    <p>Wakil Piket 1 = <?= $model->wakil_piket1 ?></p>
    <p>Wakil Piket 2 = <?= $model->wakil_piket2 ?></p>

    <p>1. Senam Pagi</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($senam_pagi as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br>

    <p>2. Makan Pagi</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($makan_pagi as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br>

    <p>3. Apel Pagi</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($apel_pagi as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->tahunAjaranKelas->kelas->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br>

    <p>4. Makan Siang</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($makan_siang as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br><br>

    <p>4. Apel Sore</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($apel_sore as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->tahunAjaranKelas->kelas->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br>

    <p>5. Makan Malam</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($makan_malam as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

    <br>

    <p>6. Apel Malam</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
            <th>Keterangan Tidak Hadir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($apel_malam as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value->tahunAjaranKelas->kelas->kelas.'</td>';
            echo '<td>'.$value->jumlah.'</td>';
            echo '<td>'.$value->hadir.'</td>';
            echo '<td>'.$value->tidak_hadir.'</td>';
            echo '<td>'.$value->keterangan_tidak_hadir.'</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
