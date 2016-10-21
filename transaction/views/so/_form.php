<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */
/* @var $form yii\widgets\ActiveForm */
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
            <?= $form->field($model, 'sodate')->textInput(['id' => 'sodate'])->label(false) ?>
          </div>
          <label for="tipeid" class="col-sm-2">Tipe Barang</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'tipeid')->textInput()->label(false) ?>
          </div>
          <label for="qty" class="col-sm-2">Jumlah</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'qty')->textInput()->label(false) ?>
          </div>
          <label for="user" class="col-sm-2">Helper</label>
          <div class="col-sm-10">
            <?= $form->field($model, 'user')->textInput(['maxlength' => true])->label(false) ?>
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
