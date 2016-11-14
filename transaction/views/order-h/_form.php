<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-h-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-2">Tanggal Order</label>
                    <?= $form->field($model, 'OrderDate')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Masukan Tanggal Order ...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'todayHighlight' => true
                        ]
                    ])->label(false); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
