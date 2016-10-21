<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'tipeid') ?>

    <?= $form->field($model, 'customerid') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'orderdate') ?>

    <?php // echo $form->field($model, 'dateadd') ?>

    <?php // echo $form->field($model, 'dateupdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
