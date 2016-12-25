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


?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-xs-12">
            <?= $this->render('_searchStock'); ?>
        </div>
        <?php if($helper != '' OR $helper != NULL) { ?>
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h1 class="box-title with-border"><?= Html::encode('Laporan Stock '. ucfirst(strtolower($nama)) .' Tanggal '.date('d F Y',strtotime($date)))?></h1>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                  <tr>
                    <th>No.</th>
                    <th>Helper</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td><?= $nama;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
</div>
