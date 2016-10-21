<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\HelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Helper';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helper-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Helper Name',
                'attribute' => 'helpername',
                'value' => 'helpername'
            ],
            [
                'header' => 'Helper Phone',
                'attribute' => 'helperphone',
                'value' => 'helperphone',
            ]

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Tambah Helper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
