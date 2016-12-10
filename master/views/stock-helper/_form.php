<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\master\models\MasterJenis;
/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelper */
/* @var $form yii\widgets\ActiveForm */

$id = Yii::$app->request->get('id','xxx');

$modelJenis = MasterJenis::find()->all();
$arrayJenis = ArrayHelper::map($modelJenis,'JenisId','JenisName');
?>

<div class="stock-helper-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                  <?= Html::hiddenInput('helpid',$id); ?>
                  <label class="col-xs-3">Jenis</label>
                  <div class="col-xs-9">
                    <?= $form->field($model, 'JenisId')->widget(Select2::classname(),[
                    'options' => ['prompt' => 'Pilih Jenis ...'],
                    'data' => $arrayJenis
                    ])->label(false) ?>
                  </div>
                  <label class="col-xs-3">Stock Isi</label>
                  <div class="col-xs-9">
                      <?= $form->field($model, 'Isi')->textInput()->label(false) ?>
                  </div>
                  <label class="col-xs-3">Stock Kosong</label>
                  <div class="col-xs-9">
                      <?= $form->field($model, 'Kosong')->textInput()->label(false) ?>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back',['index-help'], ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
