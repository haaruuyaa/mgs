<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\BonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bon-index">
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
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'ID Bon',
                                'attribute' => 'BonId',
                                'value' => 'BonId'
                            ],
                            [
                                'header' => 'Keterangan',
                                'attribute' => 'Description',
                                'value' => 'Description'
                            ],
                            [
                                'header' => 'Jumlah',
                                'attribute' => 'Amount',
                                'value' => 'Amount'
                            ],
                            [
                                'header' => 'Tanggal Bon',
                                'attribute' => 'Date',
                                'value' => 'Date'
                            ],
                            [
                                'header' => 'Status',
                                'format' => 'raw',
                                'attribute' => 'Tipe',
                                'value' => function($data)
                                {
                                    if($data['Tipe'] == 'UNPAID')
                                    {
                                        $stat = '<span class="label label-danger">Belum Bayar</span>';
                                    } else {
                                        $stat = '<span class="label label-success">Sudah Bayar</span>';
                                    }
                                    return $stat;
                                }
                            ],
                            [
                                'header' => 'Action',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    if($data['Tipe'] == 'PAID')
                                    {
                                        $link = '';
                                    } else {
                                        $link = Html::a('<i class="fa fa-dollar"></i> Bayar',['/transaction/bon/paid','id' => $data['BonId']], ['class' => 'btn btn-sm btn-success']);
                                    }
                                    
                                    return $link;
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Buat Bon', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
