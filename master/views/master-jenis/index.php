<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterJenisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Jenis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-jenis-index">
    <div class="row">
        <div class="col-md-12">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>    
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'header' => 'Jenis',
                                'attribute' => 'JenisName',
                                'value' => 'JenisName'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?php //Html::a('Create Master Jenis', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
