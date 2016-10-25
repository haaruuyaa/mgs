<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use app\master\models\Helper;
use app\master\models\Tipe;
use app\master\models\Jenis;
/* @var $this yii\web\View */
/* @var $model app\transaction\models\Setoran */
/* @var $form yii\widgets\ActiveForm */

$modelHelper = Helper::find()->all();
$modelTipe = Tipe::find()->where(['status' => 'ISI'])->all();
$modelJenis = Jenis::find()->all();

$dataHelperList = ArrayHelper::map($modelHelper,'helperid','helpername');
$dataTipeList = ArrayHelper::map($modelTipe,'tipeid','tipename');
$dataJenisList = ArrayHelper::map($modelJenis,'jenisid','jenisname');
?>

<div class="setoran-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-2">Helper</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'helperid')->widget(Select2::classname(), [
                            'data' => $dataHelperList,
                            'options' => ['placeholder' => '-- Pilih Helper --'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'width' => '45%'
                            ],
                        ])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Tipe</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'tipeid')->dropDownList($dataTipeList, 
                        ['prompt'=>'-- Pilih Tipe --',
                         'onchange'=>'
                           $.post( "index.php?r=transaction/setoran/listjenis&id="+$(this).val(), function( data ) {
                             $( "select#jenisid" ).html( data );
                           });
                       '])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jenis</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'jenisid')->dropDownList(
                            $dataJenisList,           
                            ['prompt'=>'-- Pilih Jenis --','id'=>'jenisid']
                        )->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jumlah</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'qty')->textInput()->label(false) ?>
                    </div>
                    <label class="col-xs-2">Tanggal</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Masukan tanggal setor ...'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'todayHighlight' => true,
                                'todayBtn' => true,
                            ]
                        ])->label(false) ?>
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
