<div class="apl-pgi-kelas-form">
    <form method="post">
        <input type='hidden' name='<?= Yii::$app->request->csrfParam ?>' value='<?= Yii::$app->request->getCsrfToken()?>'>

        <?php
            $i = 0;
            foreach ($tahun_ajaran_kelas as $value){
                echo '<div class="panel panel-primary">';
                echo '<div class="panel-heading">';
                echo '<b>Siswa Kelas '.$value->kelas->kelas.' :</b>';
                echo '</div>';
                echo '<div class="panel-body">';
                echo '<div class="form-group">';
                echo '<label>Jumlah</label>';
                echo '<input type="number" class="form-control" name="jumlah_siswa_kelas_'.$value->id.'" min="0" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label>Hadir</label>';
                echo '<input type="number" class="form-control" name="hadir_siswa_kelas_'.$value->id.'" min="0" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label>Tidak Hadir</label>';
                echo '<input type="number" class="form-control" name="tidak_hadir_siswa_kelas_'.$value->id.'" min="0" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label>Keterangan Tidak Hadir</label>';
                echo '<textarea class="form-control" name="keterangan_tidak_hadir_siswa_kelas_'.$value->id.'" rows="6"></textarea>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        ?>

        <button class="btn btn-success">Submit</button>
    </form>
</div>
