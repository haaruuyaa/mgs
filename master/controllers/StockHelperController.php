<?php

namespace app\master\controllers;

use Yii;
use app\master\models\StockHelper;
use app\master\models\StockHelperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\master\models\SoStockHelperHistory;
/**
 * StockHelperController implements the CRUD actions for StockHelper model.
 */
class StockHelperController extends Controller
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
     * Lists all StockHelper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockHelperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexHelp()
    {
        $searchModel = new StockHelperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockHelper model.
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
     * Creates a new StockHelper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new StockHelper();
        $search = new StockHelperSearch();

        if ($model->load(Yii::$app->request->post())) {
            $helpid = Yii::$app->request->post('helpid');
            $model->StockHelpId = $search->GenerateId();
            $model->HelperId = $helpid;
            $model->DateAdd = date('Y-m-d');
            $model->DateCrt = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StockHelper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->StockHelpId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StockHelper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDetail($id)
    {
        $searchModel = new StockHelperSearch();
        $dataProvider = $searchModel->search($id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddSo($id)
    {
        $model = $this->findModel($id);
        $stockoldisi = $model->Isi;
        $stockoldkosong = $model->Kosong;
        $helper = $model->HelperId;
        $jenis = $model->JenisId;
        if($model->load(Yii::$app->request->post()))
        {
          $modelHis = new SoStockHelperHistory();
          $newisi = Yii::$app->request->post('jmlso','xxx');

          if($helper != 'A001' && $jenis == 'G001')
          {
            $modelStockHelper = StockHelper::find()->where(['HelperId' => 'A001','JenisId' => 'G001'])->one();
            $isi = $modelStockHelper->Isi;
            $kosong = $modelStockHelper->Kosong;

            $modelStockHelper->Isi = ($isi - $newisi);
            $modelStockHelper->Kosong = ($kosong + $newisi);
            $modelStockHelper->DateUpdate = date('Y-m-d h:i:s');

          }
          else if ($helper != 'A002' && $jenis == 'AQ001')
          {
            $modelStockHelper = StockHelper::find()->where(['HelperId' => 'A002','JenisId' => 'AQ001'])->one();
            $isi = $modelStockHelper->Isi;
            $kosong = $modelStockHelper->Kosong;

            $modelStockHelper->Isi = ($isi - $newisi);
            $modelStockHelper->Kosong = ($kosong + $newisi);
            $modelStockHelper->DateUpdate = date('Y-m-d h:i:s');

          } else {

            $modelStockHelper = StockHelper::find()->where(['HelperId' => $helper,'JenisId' => $jenis])->one();
            $isi = $modelStockHelper->Isi;
            $kosong = $modelStockHelper->Kosong;

            $modelStockHelper->Isi = ($isi - $newisi);
            $modelStockHelper->Kosong = ($kosong + $newisi);
            $modelStockHelper->DateUpdate = date('Y-m-d h:i:s');
          }

          $model->Isi = $stockoldisi + $newisi;
          $model->Kosong = $stockoldkosong - $newisi;
          $model->DateUpdate = date('Y-m-d h:i:s');

          $modelHis->StockHelpId = $id;
          $modelHis->JenisId = $jenis;
          $modelHis->HelperId = $helper;
          $modelHis->Isi = $newisi;
          $modelHis->DateAdd = date('Y-m-d');
          $modelHis->DateCrt = date('Y-m-d h:i:s');

          $modelStockHelper->save();
          $modelHis->save();
          $model->save();

          return $this->redirect(['/master/stock-helper/detail','id' => $helper]);
        } else {

          return $this->render('_addso', [
              'model' => $model
          ]);
        }

    }

    /**
     * Finds the StockHelper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return StockHelper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockHelper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
