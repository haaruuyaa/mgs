<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-h-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OrderIdH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrderDate')->textInput() ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
