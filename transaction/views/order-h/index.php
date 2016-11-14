<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\OrderHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-h-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'Order ID',
                                'attribute' => 'OrderIdH',
                                'value' => 'OrderIdH'
                            ],
                            [
                                'header' => 'Tanggal Orderan',
                                'attribute' => 'OrderDate',
                                'value' => 'OrderDate'
                            ],
                            [
                                'header' => 'Action',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['order-d/create','id' => $data['OrderIdH']]);
                                }
                            ],

//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Buat Orderan', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
