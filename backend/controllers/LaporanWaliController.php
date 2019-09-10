<?php

namespace backend\controllers;

use app\models\Angkatan;
use app\models\KepalaAsrama;
use app\models\Kesehatan;
use app\models\SemesterAngkatan;
use app\models\Siswa;
use app\models\TahunAjaranSemester;
use app\models\WaliAngkatan;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yii;
use app\models\LaporanWali;
use app\models\search\LaporanWaliSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use yii\web\UploadedFile;
use backend\models\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * LaporanWaliController implements the CRUD actions for LaporanWali model.
 */
class LaporanWaliController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'print', 'index-laporan', 'index-wali-angkatan', 'download-template', 'upload-template'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'print', 'index-laporan', 'index-wali-angkatan', 'download-template', 'upload-template'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all LaporanWali models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('kepala asrama')) {
            $dataProvider = new ActiveDataProvider([
                'query' => SemesterAngkatan::find()->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Displays a single LaporanWali model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Creates a new LaporanWali model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            $semester_angkatan = new SemesterAngkatan();

            if (Yii::$app->request->post()) {
                $tahun_ajaran_semester = TahunAjaranSemester::find()->where(['is_active' => 1])->one();

                $request = Yii::$app->request->post('SemesterAngkatan');

                // Validasi apakah sudah pernah dibuat
                $semester_angkatan_check = SemesterAngkatan::find()->where(['angkatan_id' => $request['angkatan'], 'tahun_ajaran_semester_id' => $tahun_ajaran_semester->id])->one();
                if(!is_null($semester_angkatan_check)){
                    Yii::$app->session->setFlash('danger', 'Laporan angkatan ini sudah pernah dibuat');
                    return $this->redirect(['laporan-wali/create']);
                }

                $semester_angkatan->angkatan_id = $request['angkatan'];
                $semester_angkatan->tahun_ajaran_semester_id = $tahun_ajaran_semester->id;
                $semester_angkatan->save();

                $siswa_angkatan = Siswa::find()->where(['angkatan_id' => $request['angkatan']])->all();

                foreach ($siswa_angkatan as $value){
                    $laporan_wali = new LaporanWali();
                    $laporan_wali->semester_angkatan_id = $semester_angkatan->id;
                    $laporan_wali->siswa_id = $value->nisn;
                    $laporan_wali->save();
                }

                return $this->redirect(['laporan-wali/index']);
            }

            $angkatan = Angkatan::find()->all();

            return $this->render('create', [
                'semester_angkatan' => $semester_angkatan,
                'angkatan' => $angkatan,
            ]);
//            $tahun_ajaran_semester = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
//            $tahun_ajaran_kelas = $tahun_ajaran_semester->tahunAjaranKelas;
//            $kelas_siswa = array();
//            foreach ($tahun_ajaran_kelas as $value){
//                foreach ($value->kelasSiswa as $value2){
//                    $kelas_siswa[] = $value2;
//                }
//            }
//
//            foreach ($kelas_siswa as $value){
//                $model = new LaporanWali();
//                $model->siswa_id = $value->nisn;
//                $model->tahun_ajaran_kelas_id = $value->thnAjaranKelas->id;
//                $model->save();
//            }

//            return $this->redirect(['laporan-wali/index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Updates an existing LaporanWali model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Deletes an existing LaporanWali model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Finds the LaporanWali model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaporanWali the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaporanWali::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrint($id){
        $laporan_wali = LaporanWali::findOne($id);
        $kelas_siswa = null;

        $tahun_ajaran_kelas = $laporan_wali->semesterAngkatan->tahunAjaranSemester->tahunAjaranKelas;

        if($tahun_ajaran_kelas == null){
            return $this->render('error');
        }

        foreach ($tahun_ajaran_kelas as $value){
            foreach ($value->kelasSiswa as $value2){
                if($value2->nisn == $laporan_wali->siswa_id){
                    $kelas_siswa = $value2;
                    break;
                }
            }
        }

        $kesehatan = Kesehatan::find()->where([
            'tahun_ajaran_semester_id' => $laporan_wali->semesterAngkatan->tahunAjaranSemester->id,
            'siswa_id' => $laporan_wali->siswa_id,
        ])->all();
        $kepala_asrama = KepalaAsrama::find()->one();

        // Cek pembayaran apakah sudah lunas
        $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
        $semester_bulan = $tahun_ajaran_aktif->semesterBulan;
        $angkatan = $laporan_wali->siswa->angkatan;

        $pengecekan_pembayaran = array();
        foreach ($semester_bulan as $value){
            foreach ($value->bulanAngkatan as $value1){
                if($value1->angkatan_id == $angkatan->id){
                    foreach ($value1->bulanSiswa as $value2){
                        if ($value2->siswa_id == $laporan_wali->siswa_id){
                            $pengecekan_pembayaran[] = $value2;
                        }
                    }
                }
            }
        }

        // Set Variable Awal
        $kelunasan = 'Lunas';
        foreach ($pengecekan_pembayaran as $value){
            echo $value->id;
            if($value->lunas == 0 || $value->lunas == null){
                $kelunasan = 'Tidak Lunas';
                break;
            }
        }

        // Preview
//        return $this->render('view-pdf', [
//            'laporan_wali' => $laporan_wali,
//            'kelas_siswa' => $kelas_siswa,
//            'kesehatan' => $kesehatan,
//            'kepala_asrama' => $kepala_asrama,
//        ]);
//        die();

        $pdf  = $this->renderPartial('view-pdf', [
            'laporan_wali' => $laporan_wali,
            'kelas_siswa' => $kelas_siswa,
            'kesehatan' => $kesehatan,
            'kepala_asrama' => $kepala_asrama,
            'kelunasan' => $kelunasan
        ]);
        $mpdf = new Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($pdf);
        $mpdf->Output();

//        return $this->render('view-pdf', ['laporan_wali' => $laporan_wali]);
    }

    public function actionIndexLaporan($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan') || Yii::$app->user->can('kepala asrama')) {
            $semester_angkatan = SemesterAngkatan::findOne($id);
            $dataProvider = new ActiveDataProvider([
                'query' => LaporanWali::find()->where(['semester_angkatan_id' => $id]),
            ]);

            return $this->render('index-laporan', [
                'dataProvider' => $dataProvider,
                'semester_angkatan' => $semester_angkatan,
                'id' => $id,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    public function actionIndexWaliAngkatan(){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            $wali_angkatan = WaliAngkatan::find()->where(['user_id' => Yii::$app->user->id])->one();
            $angkatan = $wali_angkatan->angkatan;
            $semester_angkatan = array();

            foreach ($angkatan as $value){
                foreach ($value->semesterAngkatan as $value1){
                    $semester_angkatan[] = $value1;
                }
            }

            return $this->render('index-wali-angkatan', [
                'semester_angkatan' => $semester_angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionDownloadTemplate($id)
    {
        $semester_angkatan = SemesterAngkatan::findOne($id);
        $laporan_wali = LaporanWali::find()->where(['semester_angkatan_id' => $id])->all();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(40);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(40);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(20);

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'NAMA');
        $sheet->setCellValue('D1', 'Prestasi');
        $sheet->setCellValue('E1', 'Absensi');
        $sheet->setCellValue('F1', 'Catatan dari Konselor & Wali Angkatan');
        $sheet->setCellValue('G1', 'Fisik');
        $sheet->setCellValue('H1', 'Organisasi');

        $iterator = 2;
        foreach ($laporan_wali  as $value){
            $sheet->setCellValue('A'.$iterator, $iterator-1);
            $sheet->setCellValue('B'.$iterator, $value->siswa->nisn);
            $sheet->setCellValue('C'.$iterator, $value->siswa->nama);
            $iterator++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('template/Template_Laporan_Wali_Angkatan_'.$semester_angkatan->angkatan->angkatan.'.xlsx');

        $excel = Yii::$app->basePath.'/web/template/Template_Laporan_Wali_Angkatan_'.$semester_angkatan->angkatan->angkatan.'.xlsx';

        if (file_exists($excel)) {
            return Yii::$app->response->sendFile($excel);
        }
    }

    public function actionUploadTemplate($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('wali angkatan')) {
            $model = new Excel();

            $semester_angkatan = SemesterAngkatan::findOne($id);
            if(Yii::$app->user->can('wali angkatan') && $semester_angkatan->excel == 1){
                Yii::$app->session->setFlash('danger', "Excel sudah pernah diupload");
                return $this->actionIndexLaporan($id);
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
                        $laporan_wali = LaporanWali::find()->where(['siswa_id' => $row[1], 'semester_angkatan_id' =>
                        $id])->one();
                        $laporan_wali->prestasi = $row[3];
                        $laporan_wali->absensi = $row[4];
                        $laporan_wali->catatan = $row[5];
                        $laporan_wali->fisik = $row[6];
                        $laporan_wali->organisasi = $row[7];
                        $laporan_wali->save();
                    }
                    $i++;
                }

                $semester_angkatan->excel = 1;
                $semester_angkatan->save();

                Yii::$app->session->setFlash('success', "Behasil Upload Excel");
                return $this->actionIndexLaporan($id);
            }

            return $this->render('upload-template', [
                'model' => $model
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
