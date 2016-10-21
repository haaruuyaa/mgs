<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\Helper */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helper-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-header"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-2">Nama Helper</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'helpername')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                    <label class="col-xs-2">No Telp</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'helperphone')->textInput(['maxlength' => true])->label(false) ?>
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
