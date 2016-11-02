<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterStock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'StockId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JenisId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StockQty')->textInput() ?>

    <?= $form->field($model, 'StockDateAdd')->textInput() ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
