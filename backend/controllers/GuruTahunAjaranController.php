<?php

namespace backend\controllers;

use app\models\Guru;
use app\models\TahunAjaranSemester;
use Yii;
use app\models\GuruTahunAjaran;
use backend\models\search\GuruTahunAjaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GuruTahunAjaranController implements the CRUD actions for GuruTahunAjaran model.
 */
class GuruTahunAjaranController extends Controller
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
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all GuruTahunAjaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')) {
            // Ambil tahun ajaran yang aktif
            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
            // Ambil semua guru yang aktif di tahun ajaran aktif tersebut
            $guru_tahun_ajaran = GuruTahunAjaran::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id])->all();

            return $this->render('index', [
                'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
                'guru_tahun_ajaran' => $guru_tahun_ajaran
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    /*
     * Controller untuk menambahkan guru yang aktif pada tahun ajaran yang aktif
     */
    public function actionTambahGuru(){
        if(Yii::$app->user->can('admin')) {
            $tahun_ajaran_semester = TahunAjaranSemester::find()->where(['is_active' => 1])->one();
            $guru = Guru::find()->all();

            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();

                $guru_yang_dipilih = [];

                // Ambil guru yang dichecklist (dipilih)
                foreach ($guru as $item){
                    try{
                        $value = $request["".$item->id];
                        $guru_yang_dipilih[] = $item->id;
                    }catch (\ErrorException $e){
                        continue;
                    }
                }

                // Cek di database apakah guru yang dipilih sudah ada agar tidak terjadi duplikasi
                foreach ($guru_yang_dipilih as $item){
                    $check_duplikat = GuruTahunAjaran::find()->where([
                        'tahun_ajaran_semester_id' => $tahun_ajaran_semester->id,
                        'guru_id' => $item,
                    ])->one();

                    if($check_duplikat == null){
                        $guru_tahun_ajaran = new GuruTahunAjaran();
                        $guru_tahun_ajaran->tahun_ajaran_semester_id = $tahun_ajaran_semester->id;
                        $guru_tahun_ajaran->guru_id = $item;
                        $guru_tahun_ajaran->save();
                    }
                }

                return $this->actionIndex();
            }
            return $this->render('tambah_guru', [
                'tahun_ajaran_semester' => $tahun_ajaran_semester,
                'guru' => $guru
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }
    }

    // ====== FUNGSI BAWAAN ========

    /**
     * Displays a single GuruTahunAjaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GuruTahunAjaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GuruTahunAjaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GuruTahunAjaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GuruTahunAjaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GuruTahunAjaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GuruTahunAjaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GuruTahunAjaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
