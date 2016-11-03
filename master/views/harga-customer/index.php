<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\HargaCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harga Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-customer-index">
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
                //            ['class' => 'yii\grid\SerialColumn'],

                //            'HCID',
                            [
                                'header' => 'Customer',
                                'attribute' => 'CustomerId',
                                'value' => 'CustomerName'
                            ],
                            [
                                'header' => 'Harga Satuan',
                                'attribute' => 'Price',
                                'value' => 'Price'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>               
            </div>
        </div>
        <div class="col-md-12">
            <?= Html::a('Create Harga Customer', ['create'], ['class' => 'btn btn-success']) ?>    
        </div>
    </div>
</div>
