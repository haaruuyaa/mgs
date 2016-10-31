<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\master\models\Tipe;
use app\master\models\Jenis;
use app\master\models\Helper;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */
/* @var $form yii\widgets\ActiveForm */

$dataTipe = Tipe::find()->where('isactive = 1')->all();
$dataTipeList = ArrayHelper::map($dataTipe,'tipeid','tipename');
$modelJenis = Jenis::find()->all();
$dataJenisList = ArrayHelper::map($modelJenis,'jenisid','jenisname');
$modelHelper = Helper::find()->all();
$dataHelperList = ArrayHelper::map($modelHelper,'helperid','helpername');
?>

<div class="so-form">
  <div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h1 class="box-title with-header"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
          <label for="user" class="col-xs-3">Helper</label>
          <div class="col-xs-9">
            <?= $form->field($model, 'user')->widget(Select2::classname(), [
                    'data' => $dataHelperList,
                    'options' => ['placeholder' => '-- Pilih Helper --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '45%'
                    ],
                ])->label(false) ?>
          </div>
          <label for="sodate" class="col-xs-3">Tanggal SO</label>
          <div class="col-xs-9">
            <?= $form->field($model, 'sodate')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Masukan tanggal SO ...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'todayBtn' => true,
                    ]
                ])->label(false) ?>
          </div>
          <label class="col-xs-3">Tipe</label>
            <div class="col-xs-9">
                <?= $form->field($model, 'tipeid')->dropDownList($dataTipeList, 
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
          <label for="qty" class="col-xs-3">Jumlah</label>
          <div class="col-xs-9">
            <?= $form->field($model, 'qty')->textInput(['style' => 'width:20%'])->label(false) ?>
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
