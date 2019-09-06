<?php

namespace backend\controllers;

use app\models\Angkatan;
use app\models\BulanSiswa;
use app\models\SemesterBulan;
use app\models\Siswa;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\BulanAngkatan;
use app\models\search\BulanAngkatanSearch;
use yii\rest\IndexAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

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
                'only' => ['index', 'create', 'update', 'index-angkatan'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'index-angkatan'],
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
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara')) {
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
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara')) {
            $bulan_angkatan = BulanAngkatan::findOne($id);
            $dataProvider = new ActiveDataProvider([
                'query' => BulanSiswa::find()->where(['bulan_angkatan_id' => $id])->orderBy('id ASC'),
            ]);

            return $this->render('index-angkatan', [
                'dataProvider' => $dataProvider,
                'bulan_angkatan' => $bulan_angkatan,
            ]);

        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }
}
