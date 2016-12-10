<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelper */

$this->title = 'Update Stock Helper: ' . $model->StockHelpId;
$this->params['breadcrumbs'][] = ['label' => 'Stock Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->StockHelpId, 'url' => ['view', 'id' => $model->StockHelpId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-helper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
