<?php

use yii\helpers\Html;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranD;
use app\transaction\models\Pengeluaran;
use app\transaction\models\Pendapatan;
use app\transaction\models\Sod;
use app\transaction\models\Bon;
use app\master\models\MasterHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranDSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Setoran';
$this->params['breadcrumbs'][] = $this->title;

$Setoranidh = Yii::$app->request->get('id','xxx');

$dataSetoranH = SetoranH::find()->where(['SetoranIdH' => $Setoranidh])->one();
$helperid = $dataSetoranH['HelperId'];

$datahelper = MasterHelper::find()->where(['HelperId' => $helperid])->one();
$namahelper = $datahelper['HelperName'];

$formatDate = date('d F Y',strtotime($dataSetoranH['Date']));

$dataSetoranD = SetoranD::find()->select("sd.Qty,sd.JenisId,sd.HHID,sd.HCID,hc.Price as PriceHC, hh.Price as PriceHH,mj.JenisName")
                                ->from('SetoranD sd')
                                ->leftJoin('MasterJenis mj','mj.JenisId = sd.JenisId')
                                ->leftJoin('HargaCustomer hc','hc.HCID = sd.HCID')
                                ->leftJoin('HargaHelper hh','hh.HHID = sd.HHID')
                                ->where(['SetoranIdH' => $Setoranidh])
                                ->all();

$dataBonUnpaid = Bon::find()
        ->select('b.Description,b.Amount')
        ->from('Bon b')
        ->leftJoin('SetoranH sh','sh.HelperId = b.HelperId and sh.Date = b.Date')
        ->where(['b.HelperId' => $helperid,'b.Date' => $dataSetoranH['Date']]);

$dataBonPaid = Bon::find()
        ->select('b.Description,b.Amount')
        ->from('Bon b')
        ->leftJoin('SetoranH sh','sh.HelperId = b.HelperId and sh.Date = b.Date')
        ->where(['b.HelperId' => $helperid,'b.DatePaid' => $dataSetoranH['Date'],'b.Tipe' => 'PAID']);
        
$dataPengeluaran = Pengeluaran::find()
        ->select('pd.Description,pd.Amount')
        ->from('Pengeluaran pd')
        ->leftJoin('SetoranH sh','sh.SetoranIdH = pd.SetoranIdH')
        ->where(['sh.SetoranIdH' => $Setoranidh])
        ->union($dataBonUnpaid,true)
        ->all()
        ;

$dataPendapatan = Pendapatan::find()
        ->select('pd.Description,pd.Amount')
        ->from('Pendapatan pd')
        ->leftJoin('SetoranH sh','sh.SetoranIdH = pd.SetoranIdH')
        ->where(['sh.SetoranIdH' => $Setoranidh])
        ->union($dataBonPaid,true)
        ->all()
        ;

$dataSOHelper = Sod::find()
        ->select('sd.Qty,sd.JenisId,mj.JenisName,mn.Price')
        ->from('Sod sd')
        ->innerJoin('Soh sh','sh.SOIDH = sd.SOIDH')
        ->leftJoin('MasterJenis mj','mj.JenisId = sd.JenisId')
        ->leftJoin('MasterNet mn','mn.JenisId = sd.JenisId')
        ->where(['sh.SetoranIdH' => $Setoranidh])
        ->all()
        ;
$ArrPendapatan = [];
$ArrPengeluaran = [];
$ArrBayar = [];
$ArrSO = [];

for($i = 0;$i < count($dataSetoranD);$i++)
{
    if($dataSetoranD[$i]['HHID'] == NULL)
    {
        $price = $dataSetoranD[$i]['PriceHC'] * $dataSetoranD[$i]['Qty'];
    } else {
        $price = $dataSetoranD[$i]['PriceHH'] * $dataSetoranD[$i]['Qty'];
    }
    array_push($ArrPendapatan, $price);
}
$TotalPendapatan = array_sum($ArrPendapatan);

for($i = 0;$i < count($dataPengeluaran);$i++)
{
    $price = $dataPengeluaran[$i]['Amount'];
    array_push($ArrPengeluaran, $price);
}
$TotalPengeluaran = array_sum($ArrPengeluaran);

for($i = 0;$i < count($dataPendapatan);$i++)
{
    $price = $dataPendapatan[$i]['Amount'];
    array_push($ArrBayar, $price);
}
$TotalPembayaran = array_sum($ArrBayar);

for($i = 0;$i < count($dataSOHelper);$i++)
{
    $price = $dataSOHelper[$i]['Qty'] * $dataSOHelper[$i]['Price'];
    array_push($ArrSO, $price);
}
$TotalPengeluaranSo = array_sum($ArrSO);

$SubTotal = ($TotalPendapatan + $TotalPembayaran) - $TotalPengeluaran - $TotalPengeluaranSo;
?>
    <!-- Content Header (Page header)
    <section class="content-header">
      <h1>
        Laporan Setoran
        <small>#<?= $Setoranidh; ?></small>
      </h1>
    </section> -->
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> <?= $namahelper ?> (Murni Gas).
                    <small class="pull-right"><label>Tanggal:</label> <?= $formatDate ?></small>
                </h2>
            </div><!-- /.col -->
        </div>
      <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div><!-- /.col -->
        </div><!-- /.row -->

      <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <h3>Pendapatan</h3>
                    <thead>
                        <tr>
                            <th style="width:10%; text-align: center;">Qty</th>
                            <th style="width:10%; text-align: center;">Product</th>
                            <th style="width:65%;">Harga Satuan</th>
                            <th style="width:15%; text-align: center;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataSetoranD as $item){ ?>
                        <tr>
                            <?php
                            if($item['JenisId'] == 'G001')
                            {
                                $badge = 'label label-primary';
                            } else if ($item['JenisId'] == 'AQ001')
                            {
                                $badge = 'label label-info';
                            } else if ($item['JenisId'] == 'G002')
                            {
                                $badge = 'label label-success';
                            } else if ($item['JenisId'] == 'G003')
                            {
                                $badge = 'label label-warning';
                            } else if ($item['JenisId'] == 'G004')
                            {
                                $badge = 'label label-danger';
                            }
                            ?>
                            <td style="text-align:center;"><?= $item['Qty']; ?></td>
                            <td style="text-align:center;"><label class="<?= $badge; ?>" style="font-size: 14px;"><?= $item['JenisName']; ?></label></td>
                            <td><?php $price = ($item['HHID'] == NULL) ? $price = $item['PriceHC'] : $price = $item['PriceHH']; echo 'Rp. '.number_format($price, 0, '.', ','); ?></td>
                            <td style="text-align:center;"><?php $price = ($item['HHID'] == NULL) ? $price = $item['PriceHC'] : $price = $item['PriceHH']; $totalprice = $item['Qty'] * $price; echo 'Rp. '.number_format($totalprice, 0, '.', ','); ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <h3>Pembayaran</h3>
                    <thead>
                        <tr>
                            <th style="width:10%; text-align: center;">Keterangan</th>
                            <th style="width:10%; text-align: center;"></th>
                            <th style="width:65%;"></th>
                            <th style="width:15%; text-align: center;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataPendapatan as $item){ ?>
                        <tr>
                            <td style="text-align:center;"><?= $item['Description']; ?></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:center;"><?= 'Rp. '.number_format($item['Amount'], 0, '.', ',');?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <h3>Pengeluaran</h3>
                    <thead>
                        <tr>
                            <th style="width:10%; text-align: center;">Keterangan</th>
                            <th style="width:10%; text-align: center;"></th>
                            <th style="width:65%;"></th>
                            <th style="width:15%; text-align: center;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataPengeluaran as $item){ ?>
                        <tr>
                            <td style="text-align:center;"><?= $item['Description']; ?></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:center;"><?= 'Rp. '.number_format($item['Amount'], 0, '.', ',');?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <h3>SO</h3>
                    <thead>
                        <tr>
                            <th style="width:10%; text-align: center;">Qty</th>
                            <th style="width:10%; text-align: center;">Product</th>
                            <th style="width:65%;">Harga Satuan</th>
                            <th style="width:15%; text-align: center;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataSOHelper as $item){ ?>
                        <tr>
                            <?php
                            if($item['JenisId'] == 'G001')
                            {
                                $badge = 'label label-primary';
                            } else if ($item['JenisId'] == 'AQ001')
                            {
                                $badge = 'label label-info';
                            } else if ($item['JenisId'] == 'G002')
                            {
                                $badge = 'label label-success';
                            } else if ($item['JenisId'] == 'G003')
                            {
                                $badge = 'label label-warning';
                            } else if ($item['JenisId'] == 'G004')
                            {
                                $badge = 'label label-danger';
                            }
                            ?>
                            <td style="text-align:center;"><?= $item['Qty']; ?></td>
                            <td style="text-align:center;"><label class="<?= $badge; ?>" style="font-size: 14px;"><?= $item['JenisName']; ?></label></td>
                            <td><?= 'Rp. '.number_format($item['Price'], 0, '.', ','); ?></td>
                            <td style="text-align:center;"><?php $total = $item['Qty'] * $item['Price']; echo 'Rp. '.number_format($total, 0, '.', ',');?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

        </div><!-- /.col -->
        <div class="col-xs-6">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:75%">Total Pendapatan:</th>
                <td><?= 'Rp. '.number_format($TotalPendapatan,0,'.',',') ?></td>
              </tr>
              <tr>
                <th style="width:75%">Total Pembayaran:</th>
                <td><?= 'Rp. '.number_format($TotalPembayaran,0,'.',',') ?></td>
              </tr>
              <tr>
                <th>Total Pengeluaran:</th>
                <td><?= 'Rp. '.number_format($TotalPengeluaran,0,'.',',') ?></td>
              </tr>
              <tr>
                <th>Total Pengeluaran SO:</th>
                <td><?= 'Rp. '.number_format($TotalPengeluaranSo,0,'.',',') ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?= 'Rp. '.number_format($SubTotal,0,'.',',') ?></td>
              </tr>
            </table>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
        <div class="col-xs-12">
            <?= Html::a('Back', ['setoran-h/index'], ['class' => 'btn btn-success']) ?>
        </div>
      <!-- this row will not appear when printing
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
          <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
        </div>
      </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
