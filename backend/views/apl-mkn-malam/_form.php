<div class="apl-mkn-siang-form">
    <form method="post">
        <input type='hidden' name='<?= Yii::$app->request->csrfParam ?>' value='<?= Yii::$app->request->getCsrfToken()?>'>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Siswa Kelas X :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswa_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswa_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswa_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswa_kelas_x" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Siswa Kelas XI :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswa_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswa_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswa_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswa_kelas_xi" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Siswa Kelas XII :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswa_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswa_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswa_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswa_kelas_xii" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading" style="background-color: pink">
                <b>Siswi Kelas X :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswi_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswi_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswi_kelas_x" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswi_kelas_x" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading" style="background-color: pink">
                <b>Siswi Kelas XI :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswi_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswi_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswi_kelas_xi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswi_kelas_xi" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading" style="background-color: pink">
                <b>Siswi Kelas XII :</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_siswi_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Hadir</label>
                    <input type="number" class="form-control" name="hadir_siswi_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Tidak Hadir</label>
                    <input type="number" class="form-control" name="tidak_hadir_siswi_kelas_xii" min="0" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Tidak Hadir</label>
                    <textarea class="form-control" name="keterangan_tidak_hadir_siswi_kelas_xii" rows="6"></textarea>
                </div>
            </div>
        </div>

        <button class="btn btn-success">Submit</button>
    </form>
</div>
