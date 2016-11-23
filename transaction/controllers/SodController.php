<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\Sod;
use app\transaction\models\SodSearch;
use app\transaction\models\Soh;
use app\transaction\models\SohSearch;
use app\master\models\MasterStock;
use app\master\models\MasterStockHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SodController implements the CRUD actions for Sod model.
 */
class SodController extends Controller
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
     * Lists all Sod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sod model.
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
     * Creates a new Sod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sod();
        $searchModel = new SodSearch();
        $modelSoh = new Soh();
        $searchModelSoh = new SohSearch();
        $soidh = $searchModelSoh->GenerateId();
        $soidd = $searchModel->GenerateId();
        
        if ($model->load(Yii::$app->request->post())) {
            $sth = Yii::$app->request->post('sth','xxx');
            $storandate = Yii::$app->request->post('date','xxx');
            $jenis = $model->JenisId;
            $qty = $model->Qty;            
            
            $modelSoh->SOIDH = $soidh;
            $modelSoh->SODate = $storandate;
            $modelSoh->SetoranIdH = $sth;
            $modelSoh->DateCrt = date('Y-m-d h:i:s');
            
            $this->AddStock($jenis, $qty);
            $model->SOIDH = $soidh;
            $model->SOIDD = $soidd;
            $model->DateCrt = date('Y-m-d h:i:s');
            
            $modelSoh->save();
            $model->save();
            return $this->redirect(['setoran-d/create', 'id' => $sth]);
//            return $this->redirect(['sod/create', 'id' => Yii::$app->request->post('soidh')]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateSod()
    {
        $model = new Sod();
        $searchModel = new SodSearch();
        
        if ($model->load(Yii::$app->request->post())) {
            $soidh = Yii::$app->request->post('soidh','xxx');
            $jenis = $model->JenisId;
            $qty = $model->Qty;
            
            $model->SOIDH = $soidh;
            $model->SOIDD = $searchModel->GenerateId();
            $model->DateCrt = date('Y-m-d h:i:s');
            $this->AddStock($jenis, $qty);
            $model->save();
            return $this->redirect(['sod/create-sod', 'id' => $soidh]);
//            return $this->redirect(['sod/create', 'id' => Yii::$app->request->post('soidh')]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SOIDD]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sod model.
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
     * Finds the Sod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function AddStock($id,$qty)
    {
        $model = MasterStock::find()->where(['JenisId' => $id])->one();
        $isistock = $model['StockIsi'];
        $kosongstock = $model['StockKosong'];
        $datestock = $model['StockDateAdd'];
        $stocktotal = $model['StockTotal'];
        
        $modelHis = new MasterStockHistory();
        
        $modelHis->JenisId = $id;
        $modelHis->StockIsi = $isistock;
        $modelHis->StockKosong = $kosongstock;
        $modelHis->StockDateAdd = $datestock;
        $modelHis->StockTotal = $stocktotal;
        $modelHis->DateCrt = date('Y-m-d h:i:s');
                
        $model->StockIsi = $isistock + $qty;
        $model->StockKosong = $kosongstock - $qty;
        $model->StockDateAdd = date('Y-m-d');
        
        $modelHis->save();
        $model->save();
    }
}
