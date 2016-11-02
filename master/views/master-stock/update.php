<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterStock */

$this->title = 'Update Master Stock: ' . $model->StockId;
$this->params['breadcrumbs'][] = ['label' => 'Master Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->StockId, 'url' => ['view', 'id' => $model->StockId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
