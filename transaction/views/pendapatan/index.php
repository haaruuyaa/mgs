<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\PendapatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Pendapatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendapatan-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Pendapatan") ?></h1>
                </div>
                <div class="col-xs-12">
                    <?php //Html::a('Create Pendapatan', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

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
                            [
                                'header' => 'Hapus',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    return Html::a('<i class="fa fa-trash"></i>', ['pendapatan/delete','id' => $data['PendapatanId'],'idh' => $data['SetoranIdH']],['data-confirm' => 'Apakah yakin ingin menghapus pendapatan ini ?']);
                                }
                            ],
//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
