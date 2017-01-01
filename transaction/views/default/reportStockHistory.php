<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\master\models\MasterHelper;
use app\master\models\StockHelperSearch;
use app\master\models\SoStockHelperHistory;
use app\master\models\StockHelperHistory;
use app\master\models\MasterJenis;
use app\transaction\models\SetoranD;
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

$masterjenis = MasterJenis::find()->all();

?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-xs-12">
            <?= $this->render('_searchStock'); ?>
        </div>
        <?php if($helper != '' OR $helper != NULL) { ?>
        <?php foreach($masterjenis as $index => $data){ ?>
          <?php
          $helpers = ['A003','A004'];
          $jenis = $data['JenisId'];

          $querySoStock = SoStockHelperHistory::find()
                      ->where(['HelperId' => $helper,'JenisId' => $data['JenisId']])
                      ->andWhere(['DATE(DateCrt)' => $date])
                      // ->andWhere(['between','DATE(DateCrt)',date('Y-m-01'),$date])
                      ->orderBy('DateCrt DESC')
                      ->limit(1)
                      ->one();

          $queryhelpsoother = SoStockHelperHistory::find()
                      ->select('SUM(Isi) as Isi')
                      ->where(['IN','HelperId',$helpers])
                      ->andWhere(['JenisId' => $data['JenisId'],'DateAdd' => $date])
                      ->orderBy('DateCrt DESC')
                      ->one();
          $qtysoother = $queryhelpsoother['Isi'];

          $queryStock = StockHelperHistory::find()
                      ->where(['between','DATE(DateCrt)',date('%Y-%m-01'),$date])
                      ->andWhere(['jenisid' => $data['JenisId'],'HelperId'=> $helper])
                      ->orderBy('datecrt DESC')
                      ->limit(1)
                      ->one();

          $querypenjualan = SetoranD::find()
                      ->select('*')
                      ->from('SetoranD sd')
                      ->innerJoin('SetoranH sh','sh.SetoranIdH = sd.SetoranIdH')
                      ->where(['sh.Date' => date('Y-m-d',strtotime($date)),'sd.JenisId' => $data['JenisId'],'sh.HelperId' => $helper])
                      ->one();

          $so = $querySoStock['Isi'];
          $stock = $queryStock['Isi'];
          $penjualan = $querypenjualan['Qty'];
          $sisakemarin = ($stock - $so);
          $sisahariini = (($sisakemarin+$so) - $penjualan);
           ?>
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h1 class="box-title with-border"><?= Html::encode('Laporan Stock '.$data['JenisName'].' '. ucfirst(strtolower($nama)) .' Tanggal '.date('d F Y',strtotime($date)))?></h1>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                  <tr>
                    <th>No.</th>
                    <th>Helper</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td><?= $nama;?></td>
                    <td>Stock Kemarin</td>
                    <td><?= $sisakemarin ?></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td><?= $nama;?></td>
                    <td>SO</td>
                    <td><?= $so ?></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td><?= $nama;?></td>
                    <td>Penjualan</td>
                    <td><?= $penjualan ?></td>
                  </tr>
                  <?php if($helper == 'A002' AND $jenis == 'AQ001'){ ?>
                  <tr>
                    <td>4.</td>
                    <td><?= $nama;?></td>
                    <td>Pengurangan SO Helper</td>
                    <td><?= $qtysoother ?></td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td><?= $nama;?></td>
                    <td>Sisa</td>
                    <td><?= ($sisahariini - $qtysoother) ?></td>
                  </tr>
                  <?php } else { ?>
                  <tr>
                    <td>4.</td>
                    <td><?= $nama;?></td>
                    <td>Sisa</td>
                    <td><?= $sisahariini ?></td>
                  </tr>
                  <?php } ?>
              </table>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
</div>
