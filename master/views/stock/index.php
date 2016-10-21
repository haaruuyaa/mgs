<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stok';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //$this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'ID Stok',
                'attribute' => 'stockid',
                'value' => 'stockid'
            ],
            [
                'header' => 'Nama Stok',
                'attribute' => 'stockname',
                'value' => 'stockname'
            ],
            [
                'header' => 'Tipe Stok',
                'attribute' => 'type',
                'value' => 'type'
            ],
            [
                'header' => 'Jumlah Stok',
                'attribute' => 'stockqty',
                'value' => 'stockqty'
            ],
            [
                'header' => 'Tanggal Tambah Stok',
                'attribute' => 'stockdateadd',
                'value' => 'stockdateadd'
            ],
            // 'datecrt',

        /*    [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action'
            ], */
        ],
    ]); ?>

    <p>
        <?php //Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
