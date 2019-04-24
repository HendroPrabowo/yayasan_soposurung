<?php

namespace backend\controllers;

use app\models\MataPelajaranR;
use app\models\TahunAjaranKelas;
use Yii;
use app\models\KelasMataPelajaran;
use app\models\search\KelasMataPelajaranSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                'only' => ['view-mata-pelajaran', 'tambah-mata-pelajaran', 'tambah-mata-pelajaran-post'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view-mata-pelajaran', 'tambah-mata-pelajaran', 'tambah-mata-pelajaran-post'],
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

            return $this->render("index_mata_pelajaran", [
                "tahun_ajaran_kelas" => $tahun_ajaran_kelas
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

            $tahun_ajaran_kelas = TahunAjaranKelas::findOne($request['id_tahun_ajaran_kelas']);

            $mata_pelajaran_all = MataPelajaranR::find()->all();
            $mata_pelajaran = [];

            foreach ($mata_pelajaran_all as $item) {
                try{
                    $value = $request['pelajaran'.$item->id];
                    $mata_pelajaran[] = $item->id;
                }catch (\ErrorException $e){
                    continue;
                }
            }

            foreach ($mata_pelajaran as $value){
                $check_duplikat = KelasMataPelajaran::find()->where(['tahun_ajaran_kelas_id' => $tahun_ajaran_kelas->id, 'mata_pelajaran_id' => $value])->one();

                if($check_duplikat == null){
                    $kelas_mata_pelajaran = new KelasMataPelajaran();
                    $kelas_mata_pelajaran->tahun_ajaran_kelas_id = $tahun_ajaran_kelas->id;
                    $kelas_mata_pelajaran->mata_pelajaran_id = $value;
                    $kelas_mata_pelajaran->save();
                }
            }
            return $this->actionViewMataPelajaran($tahun_ajaran_kelas->id);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
