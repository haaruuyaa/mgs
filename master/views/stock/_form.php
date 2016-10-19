<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stockname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stocktype')->textInput() ?>

    <?= $form->field($model, 'stockqty')->textInput() ?>

    <?= $form->field($model, 'stockdateadd')->textInput() ?>

    <?= $form->field($model, 'datecrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
