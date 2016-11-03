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
    <div class="row">
        <div class="col-lg-12">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'Stock ID',
                                'attribute' => 'StockId',
                                'value' => 'StockId'
                            ],
                            [
                                'header' => 'Jenis',
                                'attribute' => 'JenisId',
                                'value' => 'JenisId'
                            ],
                            [
                                'header' => 'Jumlah',
                                'attribute' => 'StockQty',
                                'value' => 'StockQty'
                            ],
                            [
                                'header' => 'Tanggal Tambah Stock',
                                'attribute' => 'StockDateAdd',
                                'value' => 'StockDateAdd'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Create Master Stock', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>    
</div>
