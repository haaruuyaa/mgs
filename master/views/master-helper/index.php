<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterHelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Helper';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-helper-index">
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

//                            'HelperId',
                            [
                              'header' => 'Nama Helper',
                                'attribute' => 'HelperName',
                                'value' => 'HelperName'
                            ],
                            [
                              'header' => 'No Telp Helper',
                                'attribute' => 'HelperPhone',
                                'value' => 'HelperPhone'
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::a('Tambah Helper', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    
</div>    