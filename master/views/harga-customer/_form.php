<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harga-customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'HCID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomerId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
