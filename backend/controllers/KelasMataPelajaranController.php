<?php

namespace backend\controllers;

use app\models\MataPelajaranR;
use app\models\TahunAjaranKelas;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\KelasMataPelajaran;
use app\models\search\KelasMataPelajaranSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * KelasMataPelajaranController implements the CRUD actions for KelasMataPelajaran model.
 */
class KelasMataPelajaranController extends Controller
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
                'only' => ['view-mata-pelajaran', 'tambah-mata-pelajaran', 'tambah-mata-pelajaran-post', 'assign-guru'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view-mata-pelajaran', 'tambah-mata-pelajaran', 'tambah-mata-pelajaran-post', 'assign-guru'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    protected function findModel($id)
    {
        if (($model = KelasMataPelajaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * Melihat semua mata pelajaran yang telah di assing ke kelas tertetu
     */
    public function actionViewMataPelajaran($id){
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);

            $dataProvider = new ActiveDataProvider([
                'query' => KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);

            return $this->render("index_mata_pelajaran", [
                'tahun_ajaran_kelas' => $tahun_ajaran_kelas,
                'listDataProvider' => $dataProvider
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Menambahkan mata pelajaran ke kelas tertentu
     */
    public function actionTambahMataPelajaran($id){
        if(Yii::$app->user->can('admin')) {
            $model = new KelasMataPelajaran();
            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($id);
            $mata_pelajaran = MataPelajaranR::find()->all();

            return $this->render("tambah_mata_pelajaran", [
                "tahun_ajaran_kelas" => $tahun_ajaran_kelas,
                "mata_pelajaran" => $mata_pelajaran,
                "model" => $model
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Menambahkan mata pelajaran ke kelas tertentu
     */
    public function actionTambahMataPelajaranPost(){
        if(Yii::$app->user->can('admin')) {
            $request = Yii::$app->request->post();
            $pelajaran_yang_dipilih = array();

            // Ambil id yang dipilih dari request
            $i = 0;
            foreach ($request as $value){
                if($i > 2){
                    $pelajaran_yang_dipilih[] = $value;
                }
                $i++;
            }

            // Ambil kedua tahun ajaran dan semester berbeda
            $tahun_ajaran_aktif = TahunAjaranSemester::findOne($request['semester']);
            $tahun_ajaran = TahunAjaranSemester::find()->where(['tahun_ajaran' => $tahun_ajaran_aktif->tahun_ajaran])->all();

            // Ambil kedua kelas di tahun ajaran yang sama di semester berbeda
            $tahun_ajaran_kelas = array();
            foreach ($tahun_ajaran as $value_tahun_ajaran){
                $tahun_ajaran_kelas[] = TahunAjaranKelas::find()->where([
                    'tahun_ajaran_semester_id' => $value_tahun_ajaran->id,
                    'kelas_id' => $request['kelas'],
                ])->one();
            }

            // Masukkan ke database
            foreach ($tahun_ajaran_kelas as $value_tahun_ajaran_kelas){
                foreach ($pelajaran_yang_dipilih as $value_pelajaran_yang_dipilih){
                    $check_duplikat = KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $value_tahun_ajaran_kelas->id, 'mata_pelajaran_id' => $value_pelajaran_yang_dipilih])->one();

                    if($check_duplikat == null){
                        $kelas_mata_pelajaran = new KelasMataPelajaran();
                        $kelas_mata_pelajaran->tahun_ajaran_kelas_id = $value_tahun_ajaran_kelas->id;
                        $kelas_mata_pelajaran->mata_pelajaran_id = $value_pelajaran_yang_dipilih;
                        $kelas_mata_pelajaran->save();
                    }
                }
            }

            $tahun_ajaran_kelas_aktif = TahunAjaranKelas::find()->where([
                'tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id,
                'kelas_id' => $request['kelas']
            ])->one();

            return $this->actionViewMataPelajaran($tahun_ajaran_kelas_aktif->id);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    public function actionAssignGuru(){
        if(Yii::$app->user->can('admin')) {
            var_dump('Assign Guru');
            die();
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
