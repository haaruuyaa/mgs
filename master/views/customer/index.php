<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Nama Customer',
                'attribute' => 'customername',
                'value' => 'customername'
            ],
            [
                'header' => 'No Telp',
                'attribute' => 'customerphone',
                'value' => 'customerphone'
            ]
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Tambah Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
