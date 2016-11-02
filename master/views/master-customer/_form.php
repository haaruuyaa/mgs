<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustomerId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomerName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomerPhone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
