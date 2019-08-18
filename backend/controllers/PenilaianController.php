<?php

namespace backend\controllers;

use app\models\Guru;
use app\models\KelasMataPelajaran;
use app\models\KelasSiswa;
use app\models\KomponenNilai;
use app\models\Siswa;
use app\models\TahunAjaranKelas;
use app\models\TahunAjaranSemester;
use app\models\User;
use Mpdf\Mpdf;
use yii\web\UploadedFile;
use backend\models\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yii;
use app\models\Penilaian;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * PenilaianController implements the CRUD actions for Penilaian model.
 */
class PenilaianController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view-mata-pelajaran', 'view-komponen-nilai', 'view-penilaian', 'create', 'update', 'delete', 'download-template', 'upload-nilai', 'view-by-siswa', 'laporan-nilai'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view-mata-pelajaran', 'view-komponen-nilai', 'view-penilaian', 'create', 'update', 'delete', 'download-template', 'upload-nilai', 'view-by-siswa', 'laporan-nilai'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Penilaian models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            // Cek tahun ajaran aktif untuk mengambil kelas yang ada di tahun ajaran tersebut
            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();

            if($tahun_ajaran_aktif == null){
                return $this->redirect(['tahun-ajaran-semester/index']);
            }

            $dataProvider = new ActiveDataProvider([
                'query' => TahunAjaranKelas::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id]),
            ]);

            return $this->render('index-kelas', [
                'dataProvider' => $dataProvider,
                'tahun_ajaran' => $tahun_ajaran_aktif,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new Penilaian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new Penilaian();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Updates an existing Penilaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $komponen_nilai)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view-penilaian', 'id' => $komponen_nilai]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing Penilaian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Finds the Penilaian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penilaian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penilaian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewMataPelajaran($id)
    {
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);
            $kelas_mata_pelajaran = KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->all();

            $dataProvider = new ActiveDataProvider([
                'query' => KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index-mata-pelajaran', [
                'dataProvider' => $dataProvider,
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    public function actionViewKomponenNilai($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);

            $user = User::find()->where(['id' => Yii::$app->user->id])->one();

            if(Yii::$app->user->can('guru')){
                $guru = Guru::find()->where(['user_id' => $user->id])->one();

                if($kelas_mata_pelajaran->assignGuru->guru_id != $guru->id){
                    return $this->redirect(['error/forbidden-error']);
                }
            }

            $dataProvider = new ActiveDataProvider([
                'query' => KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id]),
            ]);

            // Kodingan untuk tabel baru
            $kelas_siswa = $kelas_mata_pelajaran->tahunAjaranKelas->kelasSiswa;
            $komponen_nilai = KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id])->all();
            $penilaian = Penilaian::find()->all();

            return $this->render('index-komponen-nilai', [
                'dataProvider' => $dataProvider,
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
                'kelas_siswa' => $kelas_siswa,
                'komponen_nilai' => $komponen_nilai,
                'penilaian' => $penilaian,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionViewPenilaian($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $komponen_nilai = KomponenNilai::findOne($id);
            $dataProvider = new ActiveDataProvider([
                'query' => Penilaian::find()->where(['komponen_nilai_id' => $id]),
            ]);

            return $this->render('index-nilai', [
                'dataProvider' => $dataProvider,
                'komponen_nilai' => $komponen_nilai
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionDownloadTemplate($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $komponen_nilai = KomponenNilai::findOne($id);
            $penilaian = $komponen_nilai->penilaian;

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();

            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getColumnDimension('B')->setWidth(20);
            $sheet->getColumnDimension('C')->setWidth(40);

            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'NISN');
            $sheet->setCellValue('C1', 'NAMA');
            $sheet->setCellValue('D1', 'Nilai');

            $iterator = 2;
            foreach ($penilaian  as $value){
                $sheet->setCellValue('A'.$iterator, $iterator-1);
                $sheet->setCellValue('B'.$iterator, $value->kelasSiswa->nisn);
                $sheet->setCellValue('C'.$iterator, $value->kelasSiswa->siswa->nama);
                $iterator++;
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save('template/'.$komponen_nilai->komponen_nilai.'_'.$komponen_nilai->kelasMataPelajaran->mataPelajaran->pelajaran.'_'.$komponen_nilai->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas.'.xlsx');

            $excel = Yii::$app->basePath.'/web/template/'.$komponen_nilai->komponen_nilai.'_'.$komponen_nilai->kelasMataPelajaran->mataPelajaran->pelajaran.'_'.$komponen_nilai->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas.'.xlsx';

            if (file_exists($excel)) {
                return Yii::$app->response->sendFile($excel);
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionUploadNilai($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $model = new Excel();

            $komponen_nilai = KomponenNilai::findOne($id);
            $penilaian = $komponen_nilai->penilaian;

            if($komponen_nilai->excel == 1 && Yii::$app->user->can('guru')){
                return $this->redirect(['error/forbidden-error']);
            }

            if(Yii::$app->request->post()){
                $model->excel = UploadedFile::getInstance($model, 'excel');
                $path = 'uploads/';
                $filePath = $path.$model->excel->name;
                $model->excel->saveAs($filePath);

                // membaca file
                $spreadsheet = IOFactory::load($filePath);
                $sheetdata = $spreadsheet->getActiveSheet()->toArray();

                $i = 0;
                set_time_limit(7200);
                foreach ($sheetdata as $row) {
                    if($i > 0){
                        $nisn = $row[1];
                        foreach ($penilaian as $value){
                            if($value->kelasSiswa->nisn == $nisn){
                                $value->nilai = $row[3];
                                $value->save();
                            }
                        }
                    }
                    $i++;
                }

                $komponen_nilai->excel = 1;
                $komponen_nilai->save();

                return $this->actionViewPenilaian($id);
            }

            return $this->render('upload-nilai', [
                'model' => $model
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionViewBySiswa(){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('siswa')) {
            $user = User::findOne(Yii::$app->user->id);
            $siswa = Siswa::find()->where(['user_id' => $user->id])->one();
            $kelas_siswa = KelasSiswa::find()->where(['nisn' => $siswa->nisn])->all();

            $penilaian = array();
            $penilaian_id = array();
            foreach ($kelas_siswa as $value){
                if($value->penilaian != null){
                    foreach ($value->penilaian as $item){
                        $penilaian[] = $item;
                        $penilaian_id[] = $item->id;
                    }
                }
            }

            $tahun_ajaran_siswa_aktif = array();

            $temp1 = array();
            $temp2 = array();
            $temp3 = array();
            foreach ($penilaian as $value){
                // Tampung tahun ajaran siswa aktif
                if(!in_array($value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->tahunAjaranSemester, $tahun_ajaran_siswa_aktif)){
                    $tahun_ajaran_siswa_aktif[] = $value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->tahunAjaranSemester;
                }

                // Tampung tahun ajaran kelas aktif id ke temp agar tidak berulang datanya
                if(!in_array($value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->id, $temp1)){
                    $temp1[] = $value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->id;
                }

                // Tampung kelas mata pelajaran aktif siswa tersebut
                if(!in_array($value->komponenNilai->kelasMataPelajaran->id, $temp2)){
                    $temp2[] = $value->komponenNilai->kelasMataPelajaran->id;
                }

                // Tampung id komponen nilai siswa tersebut
                if(!in_array($value->komponenNilai->id, $temp3)){
                    $temp3[] = $value->komponenNilai->id;
                }

                // Print cantik
//                echo $value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->tahunAjaranSemester->tahun_ajaran.' '.$value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->tahunAjaranSemester->semester.' '.$value->komponenNilai->kelasMataPelajaran->tahunAjaranKelas->kelas->kelas.' '.$value->komponenNilai->kelasMataPelajaran->mataPelajaran->pelajaran.' '.$value->komponenNilai->komponen_nilai.' '.$value->nilai.'<br>';
            }

            return $this->render('view-by-siswa', [
                'tahun_ajaran_siswa_aktif' => $tahun_ajaran_siswa_aktif,
                'temp1' => $temp1,
                'temp2' => $temp2,
                'temp3' => $temp3,
                'siswa' => $siswa,
                'penilaian_id' => $penilaian_id,

            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionLaporanNilai($id){
        $kelas_mata_pelajaran = KelasMataPelajaran::find()->where(['id' => $id])->one();

//        die();

        if(Yii::$app->user->can('admin') || Yii::$app->user->can('guru')) {
            $kelas_mata_pelajaran = KelasMataPelajaran::findOne($id);

            $user = User::find()->where(['id' => Yii::$app->user->id])->one();

            if(Yii::$app->user->can('guru')){
                $guru = Guru::find()->where(['user_id' => $user->id])->one();

                if($kelas_mata_pelajaran->assignGuru->guru_id != $guru->id){
                    return $this->redirect(['error/forbidden-error']);
                }
            }

            $dataProvider = new ActiveDataProvider([
                'query' => KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id]),
            ]);

            // Kodingan untuk tabel baru
            $kelas_siswa = $kelas_mata_pelajaran->tahunAjaranKelas->kelasSiswa;
            $komponen_nilai = KomponenNilai::find()->where(['kelas_mata_pelajaran_id' => $id])->all();
            $penilaian = Penilaian::find()->all();

            $pdf = $this->renderPartial('view-pdf', [
                'dataProvider' => $dataProvider,
                'kelas_mata_pelajaran' => $kelas_mata_pelajaran,
                'kelas_siswa' => $kelas_siswa,
                'komponen_nilai' => $komponen_nilai,
                'penilaian' => $penilaian,
            ]);

            $mpdf = new Mpdf([
                'format' => 'A4',
                'orientation' => 'L',
            ]);

            $mpdf->WriteHTML($pdf);
            $mpdf->Output();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
