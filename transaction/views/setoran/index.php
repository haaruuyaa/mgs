<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setoran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

//            'setoranid',
            [
                'header' => 'Helper',
                'attribute' => 'helperid',
                'value' => 'helperid',
            ],
            [
                'header' => 'Tipe',
                'attribute' => 'tipeid',
                'value' => 'tipeid',
            ],
            [
                'header' => 'Jenis',
                'attribute' => 'jenisid',
                'value' => 'jenisid',
            ],
            [
                'header' => 'Jumlah',
                'attribute' => 'qty',
                'value' => 'qty',
            ],
            // 'date',
            // 'datecrt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Buat Setoran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
