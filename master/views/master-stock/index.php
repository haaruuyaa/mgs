<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterStockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Master Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'StockId',
            'JenisId',
            'StockQty',
            'StockDateAdd',
            'DateCrt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
