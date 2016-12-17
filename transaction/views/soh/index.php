<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SohSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Soh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soh-index">
    <div class="row">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'ID SO Header',
                                'attribute' => 'SOIDH',
                                'value' => 'SOIDH'
                            ],
                            [
                                'header' => 'Tanggal SO',
                                'attribute' => 'SODate',
                                'value' => function($data)
                                {
                                    return date('d F Y',strtotime($data['SODate']));
                                }
                            ],
//                            'DateCrt',
                            [
                                'header' => 'Action',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    $href = Html::a('<i class="glyphicon glyphicon-pencil"><i>', ['sod/create-sod','id' => $data['SOIDH']]);
                                    return $href;
                                }
                            ]
//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Buat So', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
