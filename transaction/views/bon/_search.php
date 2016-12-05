<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\BonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'BonId') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'Amount') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Tipe') ?>

    <?php // echo $form->field($model, 'DateCrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
