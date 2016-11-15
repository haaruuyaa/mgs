<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengeluaran-d-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PengeluaranIdD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PengeluaranIdH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
