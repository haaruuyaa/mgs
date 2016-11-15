<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\PengeluaranDSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Pengeluaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-d-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Pengeluaran D', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],
                                                        
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

//                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
