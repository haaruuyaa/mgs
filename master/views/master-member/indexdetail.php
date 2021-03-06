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
                    <h1 class="box-title with-border"><?= Html::encode("Detail Data Pelanggan") ?></h1>
                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'header' => 'Tanggal',
                                'attribute' => 'Date',
                                'value' => function($data)
                                {
                                    return date('d F Y',strtotime($data['Date']));
                                }
                            ],
                            [
                                'header' => 'Jumlah',
                                'attribute' => 'Qty',
                                'value' => 'Qty'
                            ],
                            [
                                'header' => 'Jenis',
                                'attribute' => 'JenisId',
                                'value' => 'JenisName'
                            ]
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
