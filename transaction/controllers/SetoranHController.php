<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranHSearch;
use app\transaction\models\Soh;
use app\transaction\models\SohSearch;
use app\transaction\models\PengeluaranH;
use app\transaction\models\PengeluaranHSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\transaction\models\SetoranD;

/**
 * SetoranHController implements the CRUD actions for SetoranH model.
 */
class SetoranHController extends Controller
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
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SetoranH models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetoranHSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SetoranH model.
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
     * Creates a new SetoranH model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SetoranH();
        $searchModel = new SetoranHSearch();
        
        if ($model->load(Yii::$app->request->post())) {
            
            $setoranidh = $searchModel->GenerateId();
            
//            $this->SaveSO($setoranidh);
//            $this->SavePeng($setoranidh);
            $model->SetoranIdH = $setoranidh;
            $model->Date = $this->formatDate($model->Date);
            $model->DateCrt = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['setoran-d/create', 'id' => $model->SetoranIdH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SetoranH model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SetoranIdH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SetoranH model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modeld = SetoranD::find()->where(['SetoranIdH' => $id])->all();
        
        if(count($modeld) >= 0)
        {
            Yii::$app->db->createCommand("delete from setorand where SetoranIdH = '".$id."'")->execute();
            Yii::$app->db->createCommand("delete from setoranh where SetoranIdH = '".$id."'")->execute();
        }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the SetoranH model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SetoranH the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SetoranH::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelD($id)
    {
        if (($model = SetoranD::find()->where(['SetoranIdH' => $id])->all()) !== null) {
            return $model;
        } else {
            return $model;
        }
    }
    
    public function formatDate($date)
    {
        $totime = strtotime($date);
        $formatdate = date('Y-m-d',$totime);
        
        return $formatdate;
    }
    
    public function SaveSO($idsetoranh)
    {
        $modelSO = new Soh();
        $searchModelSo = new SohSearch();
        $soidh = $searchModelSo->GenerateId();
        
        $modelSO->SOIDH = $soidh;
        $modelSO->SetoranIdH = $idsetoranh;
        $modelSO->SODate = date('Y-m-d');
        $modelSO->DateCrt = date('Y-m-d h:i;s');
        
        $modelSO->save();
    }
    
    public function SavePeng($idsetoranh)
    {
        $modelPeng = new PengeluaranH();
        $searchModelPeng = new PengeluaranHSearch();
        $pengidh = $searchModelPeng->GenerateId();
        
        $modelPeng->PengeluaranIdH = $pengidh;
        $modelPeng->SetoranIdH = $idsetoranh;
        $modelPeng->Date = date('Y-m-d');
        $modelPeng->DateCrt = date('Y-m-d h:i;s');
        
        $modelPeng->save();
    }
}
