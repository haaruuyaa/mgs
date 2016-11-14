<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\master\models\MasterJenis;
use app\master\models\MasterHelper;
use app\master\models\MasterCustomer;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranDSearch;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */
/* @var $form yii\widgets\ActiveForm */

$setoranH = Yii::$app->request->get('id','xxx');

$dataH = SetoranH::find()->where(['SetoranIdH' => $setoranH])->one();
$helper = $dataH['HelperId'];

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
        <?php $form = ActiveForm::begin(); ?>
        <?= Html::hiddenInput('sdh',$setoranH)?>
        <?= Html::hiddenInput('helpid',$helper)?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
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

