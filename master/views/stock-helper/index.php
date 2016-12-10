<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\master\models\MasterHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\master\models\StockHelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$id = Yii::$app->request->get('id','xxx');

$masterhelper = MasterHelper::find()->where(['HelperId' => $id])->one();

$this->title = 'Stock Helper '.ucfirst(strtolower($masterhelper['HelperName']));
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="stock-helper-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                              'header' => 'Jenis',
                              'attribute' => 'JenisId',
                              'value' => 'JenisName'
                            ],
                            [
                              'header' => 'Stock Isi',
                              'attribute' => 'Isi',
                              'value' => 'Isi'
                            ],
                            [
                              'header' => 'Stock Kosong',
                              'attribute' => 'Kosong',
                              'value' => 'Kosong'
                            ],
                            [
                              'header' => 'Tanggal Tambah Stock',
                              'attribute' => 'DateAdd',
                              'value' => function($data)
                              {
                                if($data['DateAdd'] == NULL)
                                {
                                    return '';
                                } else {
                                    return date('d F Y',strtotime($data['DateAdd']));
                                }
                              }
                            ],
                            [
                              'header' => 'Tanggal Update Stock',
                              'attribute' => 'DateUpdate',
                              'value' => function($data)
                              {
                                if($data['DateUpdate'] == NULL)
                                {
                                    return '';
                                } else {
                                    return date('d F Y',strtotime($data['DateUpdate']));
                                }
                              }
                            ],
                            [
                              'header' => 'SO',
                              'format' => 'raw',
                              'value' => function($data)
                              {
                                $link = Html::a('<i class="fa fa-reply"></i>',['/master/stock-helper/add-so','id' => $data['StockHelpId']]);
                                return $link;
                              }
                            ],
                            // 'DateCrt',
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12"><?= Html::a('Tambah Stock Helper', ['create','id'=> $id], ['class' => 'btn btn-success']) ?></div>
    </div>
</div>
