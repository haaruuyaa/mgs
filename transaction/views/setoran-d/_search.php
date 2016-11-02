<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranDSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-d-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SetoranIdD') ?>

    <?= $form->field($model, 'SetoranIdH') ?>

    <?= $form->field($model, 'JenisId') ?>

    <?= $form->field($model, 'HHID') ?>

    <?= $form->field($model, 'Qty') ?>

    <?php // echo $form->field($model, 'DateCrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
