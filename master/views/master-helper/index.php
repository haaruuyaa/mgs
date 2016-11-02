<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterHelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Helpers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-helper-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Master Helper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'HelperId',
            'HelperName',
            'HelperPhone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
