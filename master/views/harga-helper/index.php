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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Harga Helper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'HHID',
            'HelperId',
            'Price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
