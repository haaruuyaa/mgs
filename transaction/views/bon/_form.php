<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\transaction\models\Bon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bon-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-3">Keterangan</label>
                    <div class="col-xs-9"><?= $form->field($model, 'Description')->textInput(['maxlength' => true])->label(false) ?></div>
                    <label class="col-xs-3">Jumlah</label>
                    <div class="col-xs-9"><?= $form->field($model, 'Amount')->textInput(['maxlength' => true])->label(false) ?></div>
                    <label class="col-xs-3">Tanggal</label>
                    <div class="col-xs-9"><?= $form->field($model, 'Date')->widget(Datepicker::classname(),[
                        'options' => ['placeholder' => 'Masukan Tanggal Bon ...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'todayHighlight' => true
                        ]
                    ])->label(false) ?></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
</div>
