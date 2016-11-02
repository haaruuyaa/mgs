<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterJenis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-jenis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'JenisId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JenisName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
