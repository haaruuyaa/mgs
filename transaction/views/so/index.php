<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SO';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="so-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
              'header' => 'SO ID',
              'attribute' => 'soid',
              'value' => 'soid'
            ],
            [
              'header' => 'SO Date',
              'attribute' => 'sodate',
              'value' => 'sodate'
            ],
            [
              'header' => 'Tipe ID',
              'attribute' => 'tipeid',
              'value' => 'tipeid'
            ],
            [
              'header' => 'Quantity',
              'attribute' => 'qty',
              'value' => 'qty'
            ],
            [
              'header' => 'User',
              'attribute' => 'user',
              'value' => 'user'
            ]
            // 'usercrt',
            // 'datecrt',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Buat SO', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
