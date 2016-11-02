<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harga-helper-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'HHID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HelperId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
