<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\master\models\MasterJenis;
use app\master\models\MasterHelper;
use app\master\models\MasterCustomer;
use app\transaction\models\Pengeluaran;
use app\transaction\models\Pendapatan;
use app\transaction\models\Sod;
use app\transaction\models\Bon;
use app\transaction\models\BonSearch;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranDSearch;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */
/* @var $form yii\widgets\ActiveForm */


//Model pengeluaran
$modelP = new Pengeluaran();
$modelP1 = new Pendapatan();
$modelS = new Sod();
$modelB = new Bon();

$setoranH = Yii::$app->request->get('id','xxx');

$dataH = SetoranH::find()
        ->select("*")
        ->from("SetoranH sth")
        ->where(['sth.SetoranIdH' => $setoranH])
        ->all();

$helper = $dataH[0]['HelperId'];
$storandate = $dataH[0]['Date'];

$dataHelper = MasterHelper::find()->where(['HelperId' => $helper])->one();
$namaHelper = $dataHelper['HelperName'];

$modelJenis = MasterJenis::find()->all();
$arrayJenis = ArrayHelper::map($modelJenis,'JenisId','JenisName');

//Model Customer
$modelCustomer = MasterCustomer::find()->all();
$arrayhelpercustomer = ArrayHelper::map($modelCustomer,'CustomerId','CustomerName');
?>
<div class="setoran-d-form">
    <div class="row">        
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Detail Setoran") ?></h1>
                </div>
                <?php $form = ActiveForm::begin(['action' => ['create']]); ?>
                <div class="box-body">
                    <?= Html::hiddenInput('sdh',$setoranH)?>
                    <?= Html::hiddenInput('helpid',$helper)?>
                    <?php if($helper == 'A005'){ ?>
                    <label class="col-xs-2">Customer</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'CustomerId')->widget(Select2::classname(),[
                          'options' => ['prompt' => 'Pilih Customer ...'],
                          'data' => $arrayhelpercustomer  
                        ])->label(false) ?>
                    </div>
                    <?php } else {} ?>
                    <label class="col-xs-2">Jenis</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'JenisId')->widget(Select2::classname(),[
                          'options' => ['prompt' => 'Pilih Jenis ...'],
                          'data' => $arrayJenis  
                        ])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jumlah</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'Qty')->textInput()->label(false) ?>
                    </div>
                    <br>
                    <div class="col-xs-12">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Pengeluaran") ?></h1>
                </div>
                <?php $form1 = ActiveForm::begin(['action' => ['pengeluaran/create']]); ?>
                <div class="box-body">
                    <?= html::hiddeninput('sth',$setoranH)?>
                    <label class="col-xs-2">Desc</label>
                    <div class="col-xs-10">
                        <?= $form1->field($modelP, 'Description')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jumlah</label>
                    <div class="col-xs-10">
                        <?= $form1->field($modelP, 'Amount')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= Html::submitButton('Save',['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Pendapatan") ?></h1>
                </div>
                <?php $form3 = ActiveForm::begin(['action' => ['pendapatan/create']]); ?>
                <div class="box-body">
                    <?= html::hiddeninput('sth',$setoranH)?>
                    <label class="col-xs-2">Desc</label>
                    <div class="col-xs-10">
                        <?= $form3->field($modelP1, 'Description')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jumlah</label>
                    <div class="col-xs-10">
                        <?= $form3->field($modelP1, 'Amount')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= Html::submitButton('Save',['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("SO") ?></h1>
                </div>
                <?php $form2 = ActiveForm::begin(['action' => ['sod/create']]); ?>
                <div class="box-body">
                    <?= Html::hiddenInput('sth',$setoranH) ?>
                    <?= Html::hiddenInput('date',$storandate) ?>
                    <?= Html::hiddenInput('helper',$helper) ?>
                    <label class="col-md-2">Jenis</label>
                    <div class="col-md-10">
                        <?= $form2->field($modelS, 'JenisId')->widget(Select2::classname(),[
                            'options' => ['placeholder' => 'Pilih Jenis ...'],
                            'data' => $arrayJenis
                        ])->label(false) ?>
                    </div>
                    <label class="col-md-2">Jumlah</label>
                    <div class="col-md-10">
                        <?= $form2->field($modelS, 'Qty')->textInput()->label(false) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= Html::submitButton('Save',['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
    <br>
    <div class="row">
        <div class="col-md-12">
         <?php 
            $searchModel = new SetoranDSearch();

            $dataProvider1 = $searchModel->searchSetoranD($setoranH);

            if($helper == 'A005'){
                echo $this->render('indexCus',[
                    'dataProvider' => $dataProvider1,
                    'helper' => $namaHelper
                ]); 
            } else {
               echo $this->render('index',[
                    'dataProvider' => $dataProvider1,
                    'helper' => $namaHelper
                ]);  
            }
            
            ?>
        </div>    
        <div class="col-md-12">
            <?php
                $searchModelPengeluaran = new \app\transaction\models\PengeluaranSearch();
                $dataProviderPengeluaran = $searchModelPengeluaran->searchPeng($setoranH);
                
                echo $this->render('/pengeluaran/index',[
                    'dataProvider' => $dataProviderPengeluaran,
                ]);  
                ?>
        </div>        
        <div class="col-md-12">
            <?php
                $searchModelPendapatan = new \app\transaction\models\PendapatanSearch();
                $dataProviderPendapatan = $searchModelPendapatan->searchPend($setoranH);
                
                echo $this->render('/pendapatan/index',[
                    'dataProvider' => $dataProviderPendapatan,
                ]);  
                ?>
        </div>
        <div class="col-md-12">
            <?php
                $searchModelSO = new \app\transaction\models\SodSearch();
                $dataProviderSO = $searchModelSO->searchSod($setoranH);
                
                echo $this->render('/sod/indexS',[
                    'dataProvider' => $dataProviderSO
                ]);  
                ?>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Hitung',['setoran-d/hitung','id'=>$setoranH], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['setoran-h/index'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    
