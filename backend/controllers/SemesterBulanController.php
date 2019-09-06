<?php

namespace backend\controllers;

use app\models\TahunAjaranSemester;
use Yii;
use app\models\SemesterBulan;
use app\models\search\SemesterBulanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * SemesterBulanController implements the CRUD actions for SemesterBulan model.
 */
class SemesterBulanController extends Controller
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
                'only' => ['index', 'view'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all SemesterBulan models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('bendahara')) {
            $searchModel = new SemesterBulanSearch();
            $tahun_ajaran_aktif = TahunAjaranSemester::find()->where(['is_active' => 1])->one();

            // Jika belum ada tahun ajaran aktif
            if($tahun_ajaran_aktif == null){
                return $this->render('index', [
                    'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
                ]);
            }

            $dataProvider = new ActiveDataProvider([
                'query' => SemesterBulan::find()->where(['tahun_ajaran_semester_id' => $tahun_ajaran_aktif->id])->orderBy('id ASC'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
            ]);
        }else{
            return $this->redirect(['error/forbidden-error']);
        }

    }

    /**
     * Finds the SemesterBulan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SemesterBulan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SemesterBulan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
