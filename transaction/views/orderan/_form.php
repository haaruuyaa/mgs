<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\master\models\Customer;
use app\master\models\Tipe;
use app\master\models\Jenis;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Orderan */
/* @var $form yii\widgets\ActiveForm */

$dataCustomer = Customer::find()->select("customerid,customername")->all();
$dataCustomerList = ArrayHelper::map($dataCustomer,'customerid','customername');
$modelJenis = Jenis::find()->all();
$dataJenisList = ArrayHelper::map($modelJenis,'jenisid','jenisname');
$dataTipe = Tipe::find()->select('tipeid,tipename')->where(['isactive' => '1'])->all();
$dateTipeList = ArrayHelper::map($dataTipe,'tipeid','tipename');
?>

<div class="orderan-form">
  <div class="row">
    <?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label for="inputCustomerID" class="col-sm-3 control-label">Customer ID</label>
            <div class="col-sm-9">
              <?php echo $form->field($model, 'customerid')->widget(Select2::classname(), [
                    'data' => $dataCustomerList,
                    'options' => ['placeholder' => '-- Pilih Customer --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '45%'
                    ],
                ])->label(false); ?>
            </div>
            <label class="col-xs-3">Tipe</label>
            <div class="col-xs-9">
                <?= $form->field($model, 'tipeid')->dropDownList($dateTipeList, 
                ['prompt'=>'-- Pilih Tipe --',
                 'onchange'=>'
                   $.post( "index.php?r=transaction/setoran/listjenis&id="+$(this).val(), function( data ) {
                     $( "select#jenisid" ).html( data );
                   });
                '])->label(false) ?>
            </div>
            <label class="col-xs-3">Jenis</label>
            <div class="col-xs-9">
                <?= $form->field($model, 'jenisid')->dropDownList(
                    $dataJenisList,           
                    ['prompt'=>'-- Pilih Jenis --','id'=>'jenisid']
                )->label(false) ?>
            </div>
            <label for="inputQty" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'qty')->textInput(['id' =>'inputQty','style' => 'width:100px'])->label(false) ?>
            </div>
            <label for="inputOrderDate" class="col-sm-3 control-label">Order Date</label>
            <div class="col-sm-9">
                <?php //$form->field($model, 'orderdate')->textInput(['id' =>'inputOrderDate'])->label(false) ?>
                <?= $form->field($model, 'orderdate')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Input order date ...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'todayBtn' => true,
                    ]
                ])->label(false); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="box-body">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>
