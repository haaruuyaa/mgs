<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Detail SO';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sod-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Detail SO") ?></h1>
                </div>
                <div class="box-body">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                
                    <?php // Html::a('Create Sod', ['create'], ['class' => 'btn btn-success']) ?>
                
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],

//                        'SOIDD',
//                        'SOIDH',
                        [
                            'header' => 'Jenis',
                            'attribute' => 'JenisId',
                            'value' => 'JenisName'
                        ],
//                        [
//                            'header' => 'Helper',
//                            'attribute' => 'HelperId',
//                            'value' => 'HelperName'
//                        ],
                        [
                            'header' => 'Jumlah',
                            'attribute' => 'Qty',
                            'value' => 'Qty'
                        ],
                        // 'DateCrt',

//                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
