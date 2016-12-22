<?php

namespace app\master\controllers;

use Yii;
use app\master\models\HargaCustomer;
use app\master\models\HargaCustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HargaCustomerController implements the CRUD actions for HargaCustomer model.
 */
class HargaCustomerController extends Controller
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
     * Lists all HargaCustomer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HargaCustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HargaCustomer model.
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
     * Creates a new HargaCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HargaCustomer();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HargaCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
     public function actionUpdate($id)
     {
         $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) ) {

             $modelNew = new HargaCustomer();

             $modelNew->CustomerId = $model->HelperId;
             $modelNew->JenisId = $model->JenisId;
             $modelNew->Price = $model->Price;
             $modelNew->SeqId = ($model->SeqId)+1;
             $modelNew->Periode = $model->Periode;
             $modelNew->save();
 //            $model->save();
             return $this->redirect(['index']);
         } else {
             return $this->render('update', [
                 'model' => $model,
             ]);
         }
     }

    /**
     * Deletes an existing HargaCustomer model.
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
     * Finds the HargaCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HargaCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HargaCustomer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
