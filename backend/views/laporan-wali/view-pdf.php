<style>
    .center{
        text-align: center;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table, .th, .td {
        border: 1px solid black;
    }
</style>

<table>
    <tr>
        <td><img src="<?= Yii::getAlias('@web/uploads/logo/yayasan_soposurung.png') ?>" style="width: 100px; height: 100px"></td>
        <td class="center">
            <h1 class="center">Asrama Yayasan Soposurung Balige</h1>
            <p class="center" style="border: 1px solid black">&nbsp;&nbsp;Jl. Dr. Adrianus Sinaga Balige – Toba Samosir 22312, Telp. (0632) 21496&nbsp;&nbsp;</p>
        </td>
    </tr>
</table>

<hr>
<h3 style="text-align: center;">LAPORAN KONDISI SISWA/I KELAS XI ANGKATAN XXVIII YASOP</h3>
<h3 style="text-align: center; margin-top: 0px">
    <?php
    $formatter = \Yii::$app->formatter;

    if($laporan_wali->semesterAngkatan->tahunAjaranSemester->semester == 'Ganjil'){
        echo 'Juli '.date("Y").' - Desember '.date("Y");
    }else{
        echo 'Januari '.date("Y").' - Juni '.date("Y");
    }
    ?>
</h3>
<p>Kepada Yth. Orangtuadari Siswa/i :</p>
<table class="table">
    <tr>
        <td class="td" style="text-align: left; font-weight: bold;"><?= $laporan_wali->siswa->nama ?></td>
        <td class="td" style="text-align: right; font-weight: bold;">Kelas:<?= $kelas_siswa->thnAjaranKelas->kelas->kelas ?>/Angkatan:<?= $laporan_wali->siswa->angkatan->angkatan ?></td>
    </tr>
</table>

<p>Berikut kami sampaikan kondisi anak Bapak/Ibu di Asrama Yayasan Soposurung, mulai dari bulan <?php
    if($laporan_wali->semesterAngkatan->tahunAjaranSemester->semester == 'Ganjil'){
        echo 'Juli '.date("Y").' - Desember '.date("Y");
    }else{
        echo 'Januari '.date("Y").' - Juni '.date("Y");
    }
    ?> :
</p>

<table class="table">
<thead>
<tr>
    <th class="th">Aspek</th>
    <th class="th">Keterangan</th>
</tr>
</thead>
<tbody>
    <tr>
        <td class="td" style="font-weight: bold; width: 20%">Akademik</td>
        <td class="td">Data akademik siswa <?= $laporan_wali->siswa->nama  ?> dapat dilihat melalui rapor semester yang telah dibagikan.</td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Prestasi</td>
        <td class="td"><?= $formatter->asNtext($laporan_wali->prestasi) ?></td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Absensi</td>
        <td class="td"><?= $formatter->asNtext($laporan_wali->absensi) ?></td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Catatan dari Konselor & Wali Angkatan</td>
        <td class="td"><?= $formatter->asNtext($laporan_wali->administrasi) ?></td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Fisik</td>
        <td class="td"><?= $formatter->asNtext($laporan_wali->fisik) ?></td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Catatan Medis</td>
        <td class="td">
            <?php
            $i = 1;
            foreach ($kesehatan as $value){
                echo $i.'. '.$value->penyakit.' ('.$value->tanggal.')<br>';
                $i++;
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Organisasi</td>
        <td class="td"><?= $formatter->asNtext($laporan_wali->organisasi) ?></td>
    </tr>
    <tr>
        <td class="td" style="font-weight: bold;">Administrasi</td>
        <td class="td"><?= $laporan_wali->administrasi ?> <?= $kelunasan ?></td>
    </tr>
</tbody>
</table>

<table class="table" style="margin-top: 50px; border: none">
    <tr>
        <td></td>
        <td></td>
        <td style="text-align: right">Balige, <?= Date('d F Y') ?></td>
    </tr>
    <tr>
        <td style="text-align: left;">Mengetahui,</td>
    </tr>
    <tr>
        <td>Kepala Asrama Yasop Balige<br><br><br><br><br><?= $kepala_asrama->nama ?></td>
        <td></td>
        <td style="text-align: right;">Wali Angkatan Kelas XI<br><br><br><br><br><?= $laporan_wali->semesterAngkatan->angkatan->waliAngkatan->nama ?></td>
    </tr>
</table>