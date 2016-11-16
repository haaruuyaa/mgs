<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\SetoranD;
use app\transaction\models\SetoranDSearch;
use app\master\models\HargaHelperSearch;
use app\master\models\HargaCustomerSearch;
use app\master\models\MasterStock;
use app\master\models\MasterStockHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SetoranDController implements the CRUD actions for SetoranD model.
 */
class SetoranDController extends Controller
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
     * Lists all SetoranD models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetoranDSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SetoranD model.
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
     * Creates a new SetoranD model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SetoranD();
        $searchModel = new SetoranDSearch();
        $hargasearch = new HargaHelperSearch();
        $hargacus = new HargaCustomerSearch();
        $Sth = Yii::$app->request->post('sdh');
        $helpid = Yii::$app->request->post('helpid');
        
        
        if ($model->load(Yii::$app->request->post())) {
            
            $qty = $model->Qty;
            $jenid = $model->JenisId;
            $cus = $model->CustomerId;
            $this->ReduceStock($jenid, $qty);
            $arrayhh = $hargasearch->GetHarga($helpid, $jenid);
            $arrayhc = $hargacus->GetHarga($cus, $jenid);
            $idhh = $arrayhh['HHID'];
            $idhc = $arrayhc['HCID'];
            $model->HCID = $idhc;
            $model->HHID = $idhh;
            $model->SetoranIdH = $Sth;
            $model->SetoranIdD = $searchModel->GenerateId();
            $model->save();
            return $this->redirect(['setoran-d/create', 'id' => $Sth]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Render page hitung setoran.
     */
    public function actionHitung()
    {
            return $this->render('indexHitung', [
            ]);
    }
    /**
     * Updates an existing SetoranD model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SetoranIdD]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SetoranD model.
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
     * Finds the SetoranD model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SetoranD the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SetoranD::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function ReduceStock($id,$qty)
    {
        $modelHis = new MasterStockHistory();
        
        $model = MasterStock::find()->where(['JenisId' => $id])->one();
        $stockisi = $model['StockIsi'];
        $stockkosong = $model['StockKosong'];
        $datestock = $model['StockDateAdd'];
        $stocktotal = $model['StockTotal'];
        $dateupdate = $model['DateUpdate'];
        
        $modelHis->StockIsi = $stockisi;
        $modelHis->StockKosong = $stockkosong;
        $modelHis->StockTotal = $stocktotal;
        $modelHis->JenisId = $id;
        $modelHis->StockDateAdd = $datestock;
        $modelHis->DateCrt = date('Y-m-d h:i:s');
        $modelHis->DateUpdate = $dateupdate;
        
        $model->StockIsi = ($stockisi - $qty);
        $model->StockKosong = ($stockkosong + $qty);
        $model->DateUpdate = date('Y-m-d h:i:s');
        $modelHis->save();
        $model->save();
    }
}
