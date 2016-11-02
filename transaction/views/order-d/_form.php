<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-d-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OrderIdD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrderIdH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomerId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JenisId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDHC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <?= $form->field($model, 'DateUpdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
