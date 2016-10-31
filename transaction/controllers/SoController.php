<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\So;
use app\transaction\models\SoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoController implements the CRUD actions for So model.
 */
class SoController extends Controller
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
     * Lists all So models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single So model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new So model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new So();

        if ($model->load(Yii::$app->request->post())) {
            
            $soid = Yii::$app->db->createCommand("SELECT
                        CONCAT(
                                'SO',
                                RIGHT(YEAR(NOW()),2),
                                RIGHT(MONTH(NOW()),2),
                                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(soid,3)),0)+1,CHAR)),3)
                        ) AS soid 
                        FROM so 
                        WHERE SUBSTRING(soid,3,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2));
            ")->queryScalar();
            $model->soid = $soid;
            $formatDate = date('Y-m-d',strtotime($model->sodate));
            
            $model->sodate = $formatDate;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing So model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->soid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing So model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the So model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return So the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = So::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
