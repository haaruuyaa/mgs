<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranHSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengeluaran-h-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PengeluaranIdH') ?>

    <?= $form->field($model, 'SetoranIdH') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'DateCrt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
