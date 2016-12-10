<?php

namespace app\master\controllers;

use Yii;
use app\master\models\MasterMember;
use app\master\models\MasterMemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\master\models\MemberDetail;
/**
 * MasterMemberController implements the CRUD actions for MasterMember model.
 */
class MasterMemberController extends Controller
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
     * Lists all MasterMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterMemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterMember model.
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
     * Creates a new MasterMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterMember();

        if ($model->load(Yii::$app->request->post())) {
            if($model->CountBuy == NULL)
            {
                $model->CountBuy = 1;
            }
            $model->DateCrt = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDetail($id)
    {
        $model =  new MemberDetail();
        $request = Yii::$app->request;

        if(Yii::$app->request->post())
        {
            $jenis = $request->post('jenis');
            $jumlah = $request->post('jumlah');
            $datebuy = $request->post('datebuy');

            $model->MemberId = $id;

            echo var_dump($id);
            die();
        } else {
            return $this->render('_detail',['id' => $id]);
        }

    }

    /**
     * Updates an existing MasterMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MemberId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MasterMember model.
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
     * Finds the MasterMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MasterMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterMember::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCountup($id)
    {
        $model = $this->findModel($id);
        $countnow = $model->CountBuy;

        $model->CountBuy = $countnow + 1;
        $model->save();

        return $this->redirect(['index']);
    }
}
