<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelperSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-helper-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'StockHelpId') ?>

    <?= $form->field($model, 'HelperId') ?>

    <?= $form->field($model, 'JenisId') ?>

    <?= $form->field($model, 'Isi') ?>

    <?= $form->field($model, 'Kosong') ?>

    <?php // echo $form->field($model, 'DateAdd') ?>

    <?php // echo $form->field($model, 'DateUpdate') ?>

    <?php // echo $form->field($model, 'DateCrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
