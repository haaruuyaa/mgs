<?php

namespace app\transaction\controllers;

use Yii;
use app\transaction\models\Setoran;
use app\transaction\models\SetoranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SetoranController implements the CRUD actions for Setoran model.
 */
class SetoranController extends Controller
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
     * Lists all Setoran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetoranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setoran model.
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
     * Creates a new Setoran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setoran();

        if ($model->load(Yii::$app->request->post())) {
            
            $setoranid = Yii::$app->db->createCommand("SELECT
                        CONCAT(
                                'S',
                                RIGHT(YEAR(NOW()),2),
                                RIGHT(MONTH(NOW()),2),
                                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(setoranid,3)),0)+1,CHAR)),3)
                        ) AS setoranid 
                        FROM setoran 
                        WHERE SUBSTRING(setoranid,2,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2));
            ")->queryScalar();
            $model->setoranid = $setoranid;
            $formatDate = date('Y-m-d',strtotime($model->date));
            
            $model->date = $formatDate;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Setoran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->setoranid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Setoran model.
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
     * Finds the Setoran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Setoran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setoran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionListjenis($id)
    {
        $countPosts = \app\master\models\Jenis::find()
                ->where(['tipeid' => $id])
                ->count();
 
        $posts = \app\master\models\Jenis::find()
                ->where(['tipeid' => $id])
                ->orderBy('jenisid DESC')
                ->all();
                
        if($countPosts>0){
                echo "<option>-- Pilih Jenis --</option>";
            foreach($posts as $post){
                echo "<option value='".$post->jenisid."'>".$post->jenisname."</option>";
            }
        }
        else{
            echo "<option>-- Pilih Jenis --</option>";
        }
 
    }
}
