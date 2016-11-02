<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-h-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SetoranIdH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HelperId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'DateCrt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
