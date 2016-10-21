<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\OrderanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
              'header' => 'Order ID',
              'attribute' => 'orderid',
              'value' => 'orderid'
            ],
            [
              'header' => 'Tipe',
              'attribute' => 'tipeid',
              'value' => 'tipeid'
            ],
            [
              'header' => 'Customer',
              'attribute' => 'customerid',
              'value' => 'customerid'
            ],
            [
              'header' => 'Quantity',
              'attribute' => 'qty',
              'value' => 'qty'
            ],
            [
              'header' => 'Order Date',
              'attribute' => 'orderdate',
              'value' => 'orderdate'
            ],
            // 'dateadd',
            // 'dateupdate',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Buat Orderan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
