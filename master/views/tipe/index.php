<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\TipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
              'header' => 'Tipe ID',
              'attribute' => 'tipeid',
              'value' => 'tipeid'
            ],
            [
              'header' => 'Tipe Name',
              'attribute' => 'tipename',
              'value' => 'tipename'
            ],
            // 'isactive:boolean',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?php //Html::a('Create Tipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
