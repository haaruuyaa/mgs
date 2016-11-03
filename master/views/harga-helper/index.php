<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\HargaHelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harga Helpers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-helper-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'header' => 'Helper',
                                'attribute' => 'HelperId',
                                'value' => 'HelperName'
                            ],
                            [
                                'header' => 'Jenis',
                                'attribute' => 'JenisId',
                                'value' => 'JenisName'
                            ],
                            [
                                'header' => 'Harga',
                                'attribute' => 'Price',
                                'value' => 'Price'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Create Harga Helper', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
