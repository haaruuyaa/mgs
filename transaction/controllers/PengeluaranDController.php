<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\PengeluaranD;
use app\transaction\models\PengeluaranDSearch;
use app\transaction\models\PengeluaranH;
use app\transaction\models\PengeluaranHSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengeluaranDController implements the CRUD actions for PengeluaranD model.
 */
class PengeluaranDController extends Controller
{
    /**
     * @inheritdoc
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
        ];
    }

    /**
     * Lists all PengeluaranD models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengeluaranDSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PengeluaranD model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PengeluaranD model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PengeluaranD();
        $searchModel = new PengeluaranDSearch();
        $modelPeng = new PengeluaranH();
        $searchModelPeng = new PengeluaranHSearch();        
        if ($model->load(Yii::$app->request->post())) {
            $sth = Yii::$app->request->post('sth','xxx');
            $pengidh = $searchModelPeng->GenerateId();
        
            $modelPeng->PengeluaranIdH = $pengidh;
            $modelPeng->SetoranIdH = $sth;
            $modelPeng->Date = date('Y-m-d');
            $modelPeng->DateCrt = date('Y-m-d h:i;s');

            $model->PengeluaranIdH = $pengidh;
            $model->PengeluaranIdD = $searchModel->GenerateId();
            $model->DateCrt = date('Y-m-d h:i:s');
            $modelPeng->save();
            $model->save();
            return $this->redirect(['setoran-d/create', 'id' => $sth]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PengeluaranD model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PengeluaranIdD]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PengeluaranD model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PengeluaranD model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PengeluaranD the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PengeluaranD::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
