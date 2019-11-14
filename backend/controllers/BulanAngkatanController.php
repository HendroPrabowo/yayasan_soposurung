<?php

namespace backend\controllers;

use app\models\Angkatan;
use app\models\BulanSiswa;
use app\models\SemesterBulan;
use app\models\Siswa;
use app\models\TahunAjaranSemester;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yii;
use app\models\BulanAngkatan;
use app\models\search\BulanAngkatanSearch;
use yii\rest\IndexAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use yii\web\UploadedFile;
use backend\models\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * BulanAngkatanController implements the CRUD actions for BulanAngkatan model.
 */
class BulanAngkatanController extends Controller
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
                'only' => ['index', 'create', 'update', 'index-angkatan', 'download-template', 'upload-template'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'index-angkatan', 'download-template', 'upload-template'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all BulanAngkatan models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara') || Yii::$app->user->can('supervisor')) {
            $searchModel = new BulanAngkatanSearch();
            $semester_bulan = SemesterBulan::findOne($id);
            $angkatan = Angkatan::find()->all();
            $dataProvider = new ActiveDataProvider([
                'query' => BulanAngkatan::find()->where(['semester_bulan_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'semester_bulan' => $semester_bulan,
                'angkatan' => $angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * @param $id = Semester Bulan
     */
    public function actionCreate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara')) {
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                $semester_bulan = SemesterBulan::findOne($id);

                $cek = BulanAngkatan::find()->where(['semester_bulan_id' => $semester_bulan->id, 'angkatan_id' => $request['angkatan']])->one();

                // Jika angkatan belum di assign
                if($cek == null){
                    $semester_bulan_all = SemesterBulan::find()->where(['tahun_ajaran_semester_id' => $semester_bulan->tahun_ajaran_semester_id])->all();

                    $siswa = Siswa::find()->where(['angkatan_id' => $request['angkatan']])->all();

                    foreach ($semester_bulan_all as $value){
                        $bulan_angkatan = new BulanAngkatan();
                        $bulan_angkatan->angkatan_id = $request['angkatan'];
                        $bulan_angkatan->semester_bulan_id = $value->id;
                        $bulan_angkatan->save();

                        foreach ($siswa as $value1){
                            $bulan_siswa = new BulanSiswa();
                            $bulan_siswa->siswa_id = $value1->nisn;
                            $bulan_siswa->bulan_angkatan_id = $bulan_angkatan->id;
                            $bulan_siswa->save();
                        }
                    }

                    Yii::$app->session->setFlash('success', "Angkatan berhasil ditambahkan");
                    return $this->actionIndex($id);
                }else{
                    Yii::$app->session->setFlash('danger', "Angkatan ini sudah di assign");
                    return $this->actionIndex($id);
                }
            }
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /**
     * Updates an existing BulanAngkatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara')) {
            $model = BulanSiswa::findOne($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                return $this->actionIndexAngkatan($model->bulanAngkatan->id);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }


    /**
     * Finds the BulanAngkatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BulanAngkatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BulanAngkatan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndexAngkatan($id){
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara') || Yii::$app->user->can('supervisor')) {
            $bulan_angkatan = BulanAngkatan::findOne($id);
            $bulan_siswa = $bulan_angkatan->bulanSiswa;

            return $this->render('index-angkatan', [
                'bulan_angkatan' => $bulan_angkatan,
                'bulan_siswa' => $bulan_siswa,
            ]);

        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionDownloadTemplate($id){
        $bulan_angkatan = BulanAngkatan::findOne($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(40);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(40);

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'NAMA');
        $sheet->setCellValue('D1', 'Kode Briva');
        $sheet->setCellValue('E1', 'Jumlah Disetor');
        $sheet->setCellValue('F1', 'Tangal (YYYY-MM-DD)');
        $sheet->setCellValue('G1', 'Lunas (1)/Tidak Lunas (0)');

        $bulan_siswa = $bulan_angkatan->bulanSiswa;

        $iterator = 2;
        foreach ($bulan_siswa  as $value){
            $sheet->setCellValue('A'.$iterator, $iterator-1);
            $sheet->setCellValue('B'.$iterator, $value->siswa->nisn);
            $sheet->setCellValue('C'.$iterator, $value->siswa->nama);
            $iterator++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('template/Template_Pembayaran_'.$bulan_angkatan->semesterBulan->bulan.'_'.$bulan_angkatan->angkatan->angkatan.'.xlsx');

        $excel = Yii::$app->basePath.'/web/template/Template_Pembayaran_'.$bulan_angkatan->semesterBulan->bulan.'_'.$bulan_angkatan->angkatan->angkatan.'.xlsx';

        if (file_exists($excel)) {
            return Yii::$app->response->sendFile($excel);
        }
    }

    public function actionUploadTemplate($id){
        $bulan_angkatan = BulanAngkatan::findOne($id);
        $model = new Excel();

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
                    $bulan_siswa = BulanSiswa::find()->where(['siswa_id' => $nisn, 'bulan_angkatan_id' => $id])->one();
                    $bulan_siswa->kode_briva = $row[3];
                    $bulan_siswa->jumlah_disetor = (string)$row[4];
                    $bulan_siswa->tanggal = (string)$row[5];
                    if($row[6] == 1 || $row[6] == 'lunas' || $row[6] == 'Lunas'){
                        $bulan_siswa->lunas = 1;
                    }else{
                        $bulan_siswa->lunas = 0;
                    }
                    $bulan_siswa->save();
                }
                $i++;
            }

            Yii::$app->session->setFlash('success', "Berhasil Upload Excel");
            return $this->actionIndexAngkatan($id);
        }

        return $this->render('upload-template', [
            'model' => $model
        ]);
    }
}
