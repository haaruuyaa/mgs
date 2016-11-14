<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\OrderDSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Order Ds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-d-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Detail Order") ?></h1>
                </div>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'Customer',
                                'attribute' => 'CustomerId',
                                'value' => 'CustomerName'
                            ],
                            [
                                'header' => 'Jenis',
                                'attribute' => 'JenisId',
                                'value' => 'JenisName'
                            ],
                            [
                                'header' => 'Harga Satuan',
                                'format' => ['decimal',2],
                                'attribute' => 'Price',
                                'value' => 'Price'
                            ],
                            [
                                'header' => 'Jumlah Barang',
                                'attribute' => 'Qty',
                                'value' => 'Qty'
                            ],
                            [
                                'header' => 'Total Harga',
                                'format' => ['decimal',2],
                                'value' => function($data)
                                {
                                    $total = $data['Price'] * $data['Qty'];
                                    return $total;
                                }
                            ]
                            // 'DateCrt',
                            // 'DateUpdate',

                //            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?php //Html::a('Create Order D', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
