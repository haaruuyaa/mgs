<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\master\models\MasterJenis;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterStock */
/* @var $form yii\widgets\ActiveForm */

$modelJenis = new MasterJenis();
$dataListJenis = MasterJenis::find()->all();
$arrayMap = ArrayHelper::map($dataListJenis,'JenisId','JenisName');
?>

<div class="master-stock-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-4">Jenis</label>
                    <div class="col-md-8"><?= $form->field($model, 'JenisId')->widget(Select2::classname(), [
                        'data' => $arrayMap,
                        'options' => ['placeholder' => 'Pilih Tipe ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); ?>
                    </div>
                    <label class="col-md-4">Isi</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'StockIsi')->textInput()->label(false) ?>
                    </div>
                    <label class="col-md-4">Kosong</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'StockKosong')->textInput()->label(false) ?>
                    </div>
                    <label class="col-md-4">Tanggal</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'StockDateAdd')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Tanggal Tambah Stok ...'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'dd/mm/yyyy',
                                'todayHighlight' => true,
                            ]
                        ])->label(false); ?>
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
