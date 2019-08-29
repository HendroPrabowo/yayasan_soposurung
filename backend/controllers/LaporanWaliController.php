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
use Yii;
use app\models\LaporanWali;
use app\models\search\LaporanWaliSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'print', 'index-laporan', 'index-wali-angkatan'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'print', 'index-laporan', 'index-wali-angkatan'],
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
        ]);
        $mpdf = new Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($pdf);
        $mpdf->Output();

//        return $this->render('view-pdf', ['laporan_wali' => $laporan_wali]);
    }

    public function actionIndexLaporan($id){
        $semester_angkatan = SemesterAngkatan::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => LaporanWali::find()->where(['semester_angkatan_id' => $id]),
        ]);

        return $this->render('index-laporan', [
            'dataProvider' => $dataProvider,
            'semester_angkatan' => $semester_angkatan,
        ]);
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

//            echo '<pre>';
//            var_dump($semester_angkatan);
//            echo '</pre>';
//
//            die();

            return $this->render('index-wali-angkatan', [
                'semester_angkatan' => $semester_angkatan,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
