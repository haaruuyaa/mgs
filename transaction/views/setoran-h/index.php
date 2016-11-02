<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setoran Hs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-h-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setoran H', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SetoranIdH',
            'HelperId',
            'Date',
            'DateCrt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
