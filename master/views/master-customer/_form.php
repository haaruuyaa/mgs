<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-customer-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-4">Nama Customer</label>
                    <div class="col-xs-8">
                        <?= $form->field($model, 'CustomerName')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-4">No Telp Customer</label>
                    <div class="col-xs-8">
                        <?= $form->field($model, 'CustomerPhone')->textInput(['maxlength' => true])->label(false) ?>
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
