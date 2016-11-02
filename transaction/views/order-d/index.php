<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\OrderDSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Ds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-d-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order D', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OrderIdD',
            'OrderIdH',
            'CustomerId',
            'JenisId',
            'IDHC',
            // 'Qty',
            // 'DateCrt',
            // 'DateUpdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
