<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\master\models\MasterCustomer;
use app\master\models\MasterJenis;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */
/* @var $form yii\widgets\ActiveForm */


$modelCustomer = new MasterCustomer();
$dataListCustomer = MasterCustomer::find()->all();
$arrayMapCustomer = ArrayHelper::map($dataListCustomer,'CustomerId','CustomerName');

$modelJenis = new MasterJenis();
$dataListJenis = MasterJenis::find()->all();
$arrayMapJenis = ArrayHelper::map($dataListJenis,'JenisId','JenisName');
?>

<div class="harga-customer-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-4">Customer</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'CustomerId')->widget(Select2::classname(),[
                            'data' => $arrayMapCustomer,
                            'options' => ['placeholder' => 'Pilih Customer ...'],
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
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
