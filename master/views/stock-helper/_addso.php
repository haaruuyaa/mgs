<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\master\models\MasterJenis;
use app\master\models\StockHelper;
/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelper */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Add So';

$id = Yii::$app->request->get('id','xxx');

$stockhelper =  StockHelper::find()
          ->select('*')
          ->from('StockHelper sh')
          ->leftJoin('MasterJenis mj','mj.JenisId = sh.JenisId')
          ->where(['sh.StockHelpId' => $id])
          ->one();
$jenisname = $stockhelper['JenisName'];

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
                  <label class="col-xs-3">Jenis</label>
                  <div class="col-xs-9">
                    <?= Html::textInput('jenis',$jenisname,['class' => 'form-group form-control','readonly' => true]) ?>
                  </div>
                  <label class="col-xs-3">Stock Isi Sekarang</label>
                  <div class="col-xs-9">
                      <?= $form->field($model, 'Isi')->textInput(['readonly' => true])->label(false) ?>
                  </div>
                  <label class="col-xs-3">Tambahan SO</label>
                  <div class="col-xs-9">
                      <?= Html::textInput('jmlso',NULL,['class' => 'form-group form-control']) ?>
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
