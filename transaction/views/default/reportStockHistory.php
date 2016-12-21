<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\master\models\MasterHelper;
use app\master\models\StockHelperSearch;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Stock History';
$this->params['breadcrumbs'][] = $this->title;

if(isset($helper))
{
    $modelHelper = MasterHelper::find()->where(['HelperId' => $helper])->one();
    $nama = $modelHelper['HelperName'];
} else {
  $helper = '';
  $nama = '';
}

if(!isset($date))
{
  $date = date('Y-m-d');
} else {
  $date = $date;
}

$searchModel = new StockHelperSearch();
$dataProvider = $searchModel->searchStockHistory($helper,$date);

?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-xs-12">
            <?= $this->render('_searchStock'); ?>
        </div>
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h1 class="box-title with-border"><?= Html::encode('Laporan Stock '. ucfirst(strtolower($nama)) .' Tanggal '.date('d F Y',strtotime($date)))?></h1>
            </div>
            <div class="box-body">
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
                        ]
                  ],
              ]); ?>
            </div>
          </div>
        </div>
    </div>
</div>
