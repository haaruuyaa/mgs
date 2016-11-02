<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-d-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SetoranIdD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SetoranIdH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JenisId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HHID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
