<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="so-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SOID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SODate')->textInput() ?>

    <?= $form->field($model, 'JenisId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HelperId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'datecrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
