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
                                'header' => 'Jenis',
                                'attribute' => 'JenisId',
                                'value' => 'JenisName'
                            ],
                            [
                                'header' => 'Jumlah Isi',
                                'attribute' => 'StockIsi',
                                'value' => 'StockIsi'
                            ],
                            [
                                'header' => 'Jumlah Kosong',
                                'attribute' => 'StockKosong',
                                'value' => 'StockKosong'
                            ],
                            [
                                'header' => 'Jumlah Stock',
                                'attribute' => 'StockTotal',
                                'value' => 'StockTotal'
                            ],
                            [
                                'header' => 'Tanggal Tambah Stock',
                                'attribute' => 'StockDateAdd',
                                'value' => function($data)
                                {
                                    $strtotime = strtotime($data['StockDateAdd']);
                                    $newDate = date("d F Y",$strtotime);
                                    
                                    return $newDate;
                                }      
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
