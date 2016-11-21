<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\PengeluaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengeluaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="col-xs-12">
                    <?php //Html::a('Create Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                                'header' => 'Harga',
                                'format' => ['decimal',0],
                                'attribute' => 'Amount',
                                'value' => 'Amount'
                            ],
//                            'DateCrt',
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
