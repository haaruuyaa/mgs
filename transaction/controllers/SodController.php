<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\Sod;
use app\transaction\models\SodSearch;
use app\transaction\models\Soh;
use app\transaction\models\SohSearch;
use app\transaction\models\SetoranH;
use app\master\models\StockHelper;
use app\master\models\SoStockHelperHistory;
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
                    // 'delete' => ['POST'],
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
            $modelstoran = SetoranH::findOne($sth);
            $help = $modelstoran['HelperId'];
            $jenis = $model->JenisId;
            $qty = $model->Qty;

            $modelSoh->SOIDH = $soidh;
            $modelSoh->SODate = $storandate;
            $modelSoh->SetoranIdH = $sth;
            $modelSoh->DateCrt = date('Y-m-d h:i:s');

            $this->AddStock($jenis, $qty,$soidh);
            if(($help == 'A002' && $jenis == 'AQ001') OR ($help == 'A002' && $jenis == 'G004'))
            {
              $this->AddStockHelper($jenis,$qty,$help);
            }
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
            $this->AddStock($jenis, $qty,$soidh);
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
    public function actionDelete($id,$idh)
    {

        $model = $this->findModel($id);
        $modelH = SetoranH::findOne($idh);
        $help = $modelH['HelperId'];
        $jenis = $model['JenisId'];
        $qty = $model['Qty'];
        $this->ReduceStock($jenis,$qty);
        if(($help == 'A002' && $jenis == 'AQ001') OR ($help == 'A002' && $jenis == 'G004'))
        {
          $this->ReduceStockHelp($jenis,$qty,$help);
        }
        $model->delete();

        return $this->redirect(['setoran-d/create','id' => $idh]);
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

    public function AddStock($id,$qty,$soidh)
    {
        $modelSoidh = Soh::find()->where(['SOIDH' => $soidh])->one();
        $sodate = $modelSoidh['SODate'];

        $model = MasterStock::find()->where(['JenisId' => $id])->one();
        $isistock = $model['StockIsi'];
        $kosongstock = $model['StockKosong'];
        $datestock = $model['StockDateAdd'];
        $stocktotal = $model['StockTotal'];
        $datecrt = $model['DateCrt'];

        $modelHis = new MasterStockHistory();
        $modelHis->JenisId = $id;
        $modelHis->StockIsi = $isistock;
        $modelHis->StockKosong = $kosongstock;
        $modelHis->StockDateAdd = $datestock;
        $modelHis->StockTotal = $stocktotal;
        $modelHis->DateUpdate = date('Y-m-d h:i:s');
        $modelHis->DateCrt = $datecrt;

        $model->StockIsi = $isistock + $qty;
        $model->StockKosong = $kosongstock - $qty;
        $model->StockDateAdd = date('Y-m-d',strtotime($sodate));

        $modelHis->save();
        $model->save();
    }

    public function AddStockHelper($id,$qty,$help)
    {
        $model = StockHelper::find()->where(['JenisId' => $id,'HelperId' => $help])->one();
        $shid = $model['StockHelpId'];
        $isistock = $model['Isi'];
        $kosongstock = $model['Kosong'];
        $datestock = $model['DateAdd'];

        $model->Isi = $isistock + $qty;
        $model->Kosong = $kosongstock - $qty;
        $model->DateUpdate = date('Y-m-d h:i:s');

        $model->save();
    }

    public function ReduceStock($id,$qty)
    {

        $model = MasterStock::find()->where(['JenisId' => $id])->one();
        $stockisi = $model['StockIsi'];
        $stockkosong = $model['StockKosong'];
        $datestock = $model['StockDateAdd'];
        $stocktotal = $model['StockTotal'];
        $dateupdate = $model['DateUpdate'];

        $model->StockIsi = ($stockisi - $qty);
        $model->StockKosong = ($stockkosong + $qty);
        $model->DateUpdate = date('Y-m-d h:i:s');
        $model->save();
    }

    public function ReduceStockHelp($id,$qty,$help)
    {

        $model = StockHelper::find()->where(['JenisId' => $id,'HelperId' => $help])->one();
        $stockisi = $model['Isi'];
        $stockkosong = $model['Kosong'];
        $datestock = $model['DateAdd'];
        $dateupdate = $model['DateUpdate'];

        $model->Isi = ($stockisi - $qty);
        $model->Kosong = ($stockkosong + $qty);
        $model->DateUpdate = date('Y-m-d h:i:s');
        $model->save();
    }
}
