<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\master\models\Tipe;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */
/* @var $form yii\widgets\ActiveForm */

$dataTipe = Tipe::find()->where('isactive = 1')->all();
$dataTipeList = ArrayHelper::map($dataTipe,'tipeid','tipename');
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
          <label for="sodate" class="col-sm-2">Tanggal SO</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'sodate')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Masukan tanggal SO ...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'todayBtn' => true,
                    ]
                ])->label(false) ?>
          </div>
          <label for="tipeid" class="col-sm-2">Tipe Barang</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'tipeid')->widget(Select2::classname(), [
                    'data' => $dataTipeList,
                    'options' => ['placeholder' => '-- Pilih Tipe Barang --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '45%'
                    ],
                ])->label(false) ?>
          </div>
          <label for="qty" class="col-sm-2">Jumlah</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'qty')->textInput(['style' => 'width:20%'])->label(false) ?>
          </div>
          <label for="user" class="col-sm-2">Helper</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'user')->textInput(['maxlength' => true,'style' => 'width:20%'])->label(false) ?>
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
