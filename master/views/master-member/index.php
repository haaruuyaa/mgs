<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\master\models\MasterMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pelanggan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-member-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="col-xs-12">
                    <?= Html::a('Tambah Data Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'header' => 'Alamat Pelanggan',
                                'attribute' => 'MemberAddress',
                                'value' => 'MemberAddress'
                            ],
                            [
                                'header' => 'Persentase',
                                'attribute' => 'CountBuy',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    $Html = '<div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-info" style="width: '.$data['CountBuy'].'%"></div>
                                              </div>';
                                    return $Html;
                                }
                            ],
                            [
                                'header' => 'Label',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    $html = '<span class="badge bg-green">'.$data['CountBuy'].'%</span>';
                                    return $html;
                                }
                            ],
                            [
                                'header' => 'Action',
                                'format' => 'raw',
                                'value' => function($data)
                                {
                                    return Html::a('<i class="fa fa-thumbs-o-up"></i>', ['countup','id' => $data['MemberId']]);
                                }
                            ]
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
