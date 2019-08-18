<style>
    h3{
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

<div class="penilaian-index">
    <h3>Laporan Perkembangan Nilai Siswa/I</h3>
    <h3>Kelas : <?= $kelas_mata_pelajaran->tahunAjaranKelas->kelas->kelas ?></h3>
    <h3>Semester / T.A  : <?= $kelas_mata_pelajaran->tahunAjaranKelas->tahunAjaranSemester->semester ?> / <?= $kelas_mata_pelajaran->tahunAjaranKelas->tahunAjaranSemester->tahun_ajaran ?></h3>

    <p>Mata Pelajaran : <?= $kelas_mata_pelajaran->mataPelajaran->pelajaran ?></p>
    <p>Guru : <?= $kelas_mata_pelajaran->assignGuru->guru->nama ?></p>

    <table >
        <thead>
        <tr>
            <td><b>No</b></td>
            <td><b>NISN</b></td>
            <td><b>Nama</b></td>
            <?php
            foreach ($komponen_nilai as $item){
                echo '<td><b>'.$item->komponen_nilai.'</b></td>';
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($kelas_siswa as $value){
            echo '<tr>';
            echo '<td>'.$i.'</td><td>'.$value->nisn.'</td><td>'.$value->siswa->nama.'</td>';
            foreach ($komponen_nilai as $komponen){
                foreach ($penilaian as $nilai){
                    if($nilai->kelasSiswa->nisn == $value->nisn && $komponen->id == $nilai->komponen_nilai_id){
                        echo '<td>'.$nilai->nilai.'</td>';
                    }
                }
            }
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
