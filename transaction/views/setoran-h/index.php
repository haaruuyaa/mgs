<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setoran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-h-index">
    <div class="row">
        <div class="col-md-12">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'Helper',
                                'attribute' => 'HelperId',
                                'value' => 'HelperName'
                            ],
                            [
                                'header' => 'Tanggal',
                                'attribute' => 'Date',
                                'value' => 'Date'
                            ],
                            [
                                'header' => 'Action',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['setoran-d/create','id'=>$data['SetoranIdH']]);
                                }
                            ],
//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Buat Setoran', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
