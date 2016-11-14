<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\transaction\models\OrderH;
use app\transaction\models\OrderDSearch;
use kartik\select2\Select2;
use app\master\models\MasterCustomer;
use app\master\models\MasterJenis;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */
/* @var $form yii\widgets\ActiveForm */

//Get ID from url
$idodh = Yii::$app->request->get('id','xxx');

//Get Orderdate using order idh
$dataH  = OrderH::find()->where(['OrderIdH' => $idodh])->one();
$orderdate = $dataH['OrderDate'];
$formatDate = date('d F Y',strtotime($orderdate));

//Model Customer
$modelCustomer = MasterCustomer::find()->all();
$arrayhelpercustomer = ArrayHelper::map($modelCustomer,'CustomerId','CustomerName');

//Model Jenis
$modelJenis = MasterJenis::find()->all();
$arrayhelperjenis = ArrayHelper::map($modelJenis,'JenisId','JenisName');
?>

<div class="order-d-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <?= Html::hiddenInput('odh', $idodh) ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Buat Orderan tanggal $formatDate") ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-2">Customer</label>
                    <div class="col-md-10">
                    <?= $form->field($model, 'CustomerId')->widget(Select2::classname(),[
                            'data' => $arrayhelpercustomer,
                            'options' => ['placeholder' => 'Pilih Customer ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?></div>
                    <label class="col-md-2">Jenis</label>
                    <div class="col-md-10">
                    <?= $form->field($model, 'JenisId')->widget(Select2::classname(),[
                            'data' => $arrayhelperjenis,
                            'options' => [
                                'placeholder' => 'Pilih Jenis ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?></div>
                    <label class="col-md-2">Jumlah</label>
                    <div class="col-md-10"><?= $form->field($model, 'Qty')->textInput()->label(false) ?></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
    <br>
    <?php 
    $searchModel = new OrderDSearch();
    
    $dataProvider1 = $searchModel->searchOrderD($idodh);
    
    echo $this->render('index',[
        'dataProvider' => $dataProvider1,
    ]); 
    ?>
