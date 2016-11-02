<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderDSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-d-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'OrderIdD') ?>

    <?= $form->field($model, 'OrderIdH') ?>

    <?= $form->field($model, 'CustomerId') ?>

    <?= $form->field($model, 'JenisId') ?>

    <?= $form->field($model, 'IDHC') ?>

    <?php // echo $form->field($model, 'Qty') ?>

    <?php // echo $form->field($model, 'DateCrt') ?>

    <?php // echo $form->field($model, 'DateUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
