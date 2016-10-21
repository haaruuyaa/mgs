<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Setoran */
/* @var $form yii\widgets\ActiveForm */
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
                        <?= $form->field($model, 'helperid')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Tipe</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'tipeid')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jenis</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'jenisid')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Jumlah</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'qty')->textInput()->label(false) ?>
                    </div>
                    <label class="col-xs-2">Tanggal</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'date')->textInput()->label(false) ?>
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
