<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\master\models\MasterHelper;
use app\master\models\MasterJenis;
use kartik\date\Datepicker;
/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */
/* @var $form yii\widgets\ActiveForm */

$modelHelper = new MasterHelper();
$dataListHelper = MasterHelper::find()->all();
$arrayMapHelper = ArrayHelper::map($dataListHelper,'HelperId','HelperName');

$modelJenis = new MasterJenis();
$dataListJenis = MasterJenis::find()->all();
$arrayMapJenis = ArrayHelper::map($dataListJenis,'JenisId','JenisName');
?>

<div class="harga-helper-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-4">Helper</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'HelperId')->widget(Select2::classname(),[
                            'data' => $arrayMapHelper,
                            'options' => ['placeholder' => 'Pilih Helper ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?>
                    </div>
                    <label class="col-md-4">Jenis</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'JenisId')->widget(Select2::classname(),[
                            'data' => $arrayMapJenis,
                            'options' => ['placeholder' => 'Pilih Jenis ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?>
                    </div>
                    <label class="col-md-4">Harga</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'Price')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <?php if(!$model->IsNewRecord){ ?>
                    <label class="col-md-4">Tanggal Berubah</label>
                    <div class="col-md-8">
                      <?= $form->field($model, 'Periode')->widget(DatePicker::classname(),[
                          'options' => ['placeholder' => 'Masukan Tanggal Berubah ...'],
                          'pluginOptions' => [
                              'autoclose'=>true,
                              'todayHighlight' => true,
                              'format' => 'yyyy-mm-dd'
                          ]
                      ])->label(false) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save' , ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
