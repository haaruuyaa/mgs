<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterStock */

$this->title = $model->StockId;
$this->params['breadcrumbs'][] = ['label' => 'Master Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->StockId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->StockId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'StockId',
            'JenisId',
            'StockQty',
            'StockDateAdd',
            'DateCrt',
        ],
    ]) ?>

</div>
