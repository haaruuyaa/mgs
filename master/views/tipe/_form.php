<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\Tipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isactive')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
