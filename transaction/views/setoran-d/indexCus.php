<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\master\models\HargaCustomer;
use app\master\models\HargaHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranDSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Setoran Ds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-d-index">
    <div class="row">
        <div class="col-md-12">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($helper) ?></h1>
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
                                'header' => 'Jumlah',
                                'attribute' => 'Qty',
                                'value' => 'Qty'
                            ],
                            [
                                'header' => 'Harga Satuan',
                                'format'=>['decimal',2],
                                'attribute' => 'Price',
                                'value' => function($data)
                                {                                    
                                    if($data['HHID'] == NULL)
                                    {
                                        $id = $data['HCID'];
                                        $search = HargaCustomer::find()->where(['HCID' => $id])->one();
                                        $price = $search['Price'];
                                    } else {
                                        $id = $data['HHID'];
                                        $search = HargaHelper::find()->where(['HHID' => $id])->one();
                                        $price = $search['Price'];
                                    }
                                                                        
                                    return $price;
                                }
                            ],
                            [
                                'header' => 'Total Harga',
                                'format'=>['decimal',2],
                                'value' => function($data)
                                {
                                    if($data['HHID'] == NULL)
                                    {
                                        $id = $data['HCID'];
                                        $search = HargaCustomer::find()->where(['HCID' => $id])->one();
                                        $price = $search['Price'];
                                    } else {
                                        $id = $data['HHID'];
                                        $search = HargaHelper::find()->where(['HHID' => $id])->one();
                                        $price = $search['Price'];
                                    }
                                    
                                    $total = $price * $data['Qty'];
                                    
                                    return $total;
                                }
                            ]
                            // 'DateCrt',

                //            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
                <?PHP //Html::a('Create Setoran D', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
