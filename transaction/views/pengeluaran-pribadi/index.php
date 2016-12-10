<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\Datepicker;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\PengeluaranPribadiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengeluaran Pribadi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-pribadi-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                
                <?php //\ echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-body">
                    <?= Html::a('Tambah Pengeluaran Pribadi', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            
                            [
                                'header' => 'Tanggal',
                                'attribute' => 'Date',
                                'format' => 'raw',
                                'filter' => DatePicker::widget([
                                    'model' => $searchModel, 
                                    'attribute' => 'Date',
                                    'options' => ['placeholder' => 'Pilih Tanggal ...'],
                                    'pluginOptions' => [
                                        'todayHighlight' => true,
                                        'autoclose'=>true,
                                        'format' => 'yyyy/mm/dd'
                                    ]
                                ]),
                                'value' => function($data)
                                {
                                    $toTime = strtotime($data['Date']);
                                    $dateFormat = date('d F Y',$toTime);
                                    
                                    return $dateFormat;
                                }
                            ],
                            [
                                'header' => 'Keterangan',
                                'attribute' => 'Description',
                                'value' => 'Description'
                            ],
                            [
                                'header' => 'Jumlah',
                                'format' => ['decimal',0],
                                'attribute' => 'Amount',
                                'value' => 'Amount'
                            ],

//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
