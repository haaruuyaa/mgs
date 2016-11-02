<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\OrderHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Hs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-h-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order H', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OrderIdH',
            'OrderDate',
            'DateCrt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
