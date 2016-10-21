<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="so-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'soid') ?>

    <?= $form->field($model, 'sodate') ?>

    <?= $form->field($model, 'tipeid') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'usercrt') ?>

    <?php // echo $form->field($model, 'datecrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
