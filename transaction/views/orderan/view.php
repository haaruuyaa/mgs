<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Orderan */

$this->title = $model->orderid;
$this->params['breadcrumbs'][] = ['label' => 'Orderans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->orderid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->orderid], [
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
            'orderid',
            'tipeid',
            'customerid',
            'qty',
            'orderdate',
            'dateadd',
            'dateupdate',
        ],
    ]) ?>

</div>
