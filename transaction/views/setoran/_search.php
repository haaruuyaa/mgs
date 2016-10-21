<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'setoranid') ?>

    <?= $form->field($model, 'helperid') ?>

    <?= $form->field($model, 'tipeid') ?>

    <?= $form->field($model, 'jenisid') ?>

    <?= $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'datecrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
