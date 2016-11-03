<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-customer-index">
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
                        'filterModel' => $searchModel,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],

//                            'CustomerId',
                            [
                                'header' => 'Nama Customer',
                                'attribute' => 'CustomerName',
                                'value' => 'CustomerName'
                            ],
                            [
                                'header' => 'No. Tlp Customer',
                                'attribute' => 'CustomerPhone',
                                'value' => 'CustomerPhone'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Create Master Customer', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
