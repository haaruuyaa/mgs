<?php

use yii\helpers\Html;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranD;
use app\transaction\models\Sod;
use app\master\models\MasterHelper;
use app\master\models\MasterCustomer;
use app\master\models\HargaCustomer;
use app\transaction\models\Pengeluaran;
use app\transaction\models\Pendapatan;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pendapatan';
$this->params['breadcrumbs'][] = $this->title;

$id = Yii::$app->request->get('id','xxx');
$year = Yii::$app->request->get('year',date('o'));
$month = Yii::$app->request->get('month',date('m'));

$arrPendptn = array();
$modelCustomer = MasterCustomer::find()->all();

$modelHelper = MasterHelper::find()->where(['HelperId' => $id])->one();
$helperName = $modelHelper['HelperName'];

$SO = Sod::find()
        ->select("*")
        ->from("SOD sd")
        ->leftJoin('SOH sh','sh.SOIDH = sd.SOIDH')
        ->where([
            'sd.JenisId' => 'G002',
            'MONTH(sh.SODate)' => $month,
            'YEAR(sh.SODate)' => $year,
          ])
        ->orderBy(['sh.SODate' => SORT_ASC])
        ->all();

$SOSum = Sod::find()
        ->select("sum(sd.Qty) as Qty")
        ->from("SOD sd")
        ->leftJoin('SOH sh','sh.SOIDH = sd.SOIDH')
        ->where([
            'sd.JenisId' => 'G002',
            'MONTH(sh.SODate)' => $month,
            'YEAR(sh.SODate)' => $year,
            ])
        ->one();

$hargaNet = \app\master\models\MasterNet::find()
        ->select('*')
        ->from("MasterNet mn")
        ->where(['JenisId' => 'G002'])
        ->one();

$hargaSatuan = $hargaNet['Price'];

$modelPengeluaran = Pengeluaran::find()
        ->select("*")
        ->from("Pengeluaran p")
        ->leftJoin("SetoranH sh","sh.SetoranIdh = p.SetoranIdH")
        ->where([
          'sh.HelperId' => $id,
          'MONTH(sh.Date)' => $month,
          'YEAR(sh.Date)' => $year,
        ])
        ->orderBy(['sh.Date' => SORT_ASC])
        ->groupBy(['sh.Date'])
        ->all();

$modelPendapatan = Pendapatan::find()
        ->select("*")
        ->from("Pendapatan p")
        ->leftJoin("SetoranH sh","sh.SetoranIdh = p.SetoranIdH")
        ->where([
          'sh.HelperId' => $id,
          'MONTH(sh.Date)' => $month,
          'YEAR(sh.Date)' => $year,
        ])
        ->orderBy(['sh.Date' => SORT_ASC])
        ->groupBy(['sh.Date'])
        ->all();

$modelSumPend = Pendapatan::find()
                ->select("sum(p.Amount) as Amount")
                ->from('Pendapatan p')
                ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                ->where([
                  'MONTH(sh.Date)' => $month,
                  'YEAR(sh.Date)' => $year,
                  'sh.HelperId'=>$id
                ])
                ->one()
                ;
?>
<div class="transaction-default-index">
    <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="img/default-50x50.gif" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= ucfirst(strtolower($helperName)); ?></h3>
                  <p class="text-muted text-center">Helper</p>

                  <ul class="list-group list-group-unbordered">
                      <?php foreach($modelCustomer as $index => $cus){ ?>
                      <?php $modalsetoran = SetoranH::find()
                                    ->select("SUM(sd.Qty) as Qty")
                                    ->from('SetoranH sh')
                                    ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                    ->where([
                                      'sd.CustomerId' => $cus['CustomerId'],
                                      'sd.JenisId' => 'G002',
                                      'MONTH(sh.Date)' => $month,
                                      'YEAR(sh.Date)' => $year,
                                    ])
                                    ->one();

                            $qty = $modalsetoran['Qty']; ?>
                    <li class="list-group-item">
                      <b><?= $cus['CustomerName'] ?></b> <a class="pull-right"><?= $qty; ?></a>
                    </li>
                      <?php } ?>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                        <h1 class="box-title with-border"><?= Html::encode("Laporan Penjualan ".ucfirst(strtolower($helperName))) ?></h1>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Nama</th>
                              <th style="width: 150px">Harga Satuan</th>
                              <th style="width: 100px">Qty</th>
                              <th style="width: 100px">Total</th>
                            </tr>
                            <?php foreach($modelCustomer as $index => $cus){ ?>
                            <?php
                            $modalsetoran = SetoranH::find()
                                    ->select("SUM(sd.Qty) as Qty")
                                    ->from('SetoranH sh')
                                    ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                    ->where([
                                      'MONTH(sh.Date)' => $month,
                                      'YEAR(sh.Date)' => $year,
                                      'sd.JenisId' => 'G002',
                                      'sd.CustomerId' => $cus['CustomerId']
                                    ])
                                    ->one();

                            $qty = $modalsetoran['Qty'];

                            $modelHarga = HargaCustomer::find()
                                    ->select("*")
                                    ->from("HargaCustomer hc")
                                    ->where(['hc.CustomerId' => $cus['CustomerId'],'hc.JenisId' => 'G002'])
                                    ->one();
                            $price = $modelHarga['Price'];

                            $TotalPrice = $price * $qty;

                            array_push($arrPendptn, $TotalPrice);
                            $TotalAllPrice = array_sum($arrPendptn);
                            ?>
                            <tr>
                              <td><?= $index+1; ?>.</td>
                              <td><?= $cus['CustomerName'] ?></td>
                              <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                              <td><?= $qty; ?></td>
                              <td><span class="badge bg-green"><?= 'Rp. '.number_format($TotalPrice,0,'.',','); ?></span></td>
                            </tr>
                            <?php }  ?>
                            <tr>
                              <td style="width: 10px"><?= (count($modelCustomer)+1)."."; ?></td>
                              <td style="width: 150px">Total Pendapatan</td>
                              <td></td>
                              <td></td>
                              <td style="width: 100px"><span class="badge bg-red"><?= 'Rp. '.number_format($TotalAllPrice,0,'.',',')?></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#</th>
                              <th style="width: 150px">Tanggal</th>
                              <th>Keterangan</th>
                              <th style="width: 100px">Total</th>
                            </tr>
                            <?php foreach($modelPendapatan as $index => $penditem){ ?>
                            <tr>
                                <td><?= ($index+1)."."; ?></td>
                                <td><?= date('d-m-Y',strtotime($penditem['Date'])); ?></td>
                                <td>
                                    <ul>
                                        <?php
                                        $modelPenddesc = Pendapatan::find()
                                                        ->select("*")
                                                        ->from('Pendapatan p')
                                                        ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                                                        ->where([
                                                          'sh.Date' => $penditem['Date'],
                                                          'sh.HelperId'=>$id,
                                                          'MONTH(sh.Date)' => $month,
                                                          'YEAR(sh.Date)' => $year,
                                                        ])
                                                        ->all()
                                                        ;

                                        $modelPendsum = Pendapatan::find()
                                                        ->select("sum(p.Amount) as Amount")
                                                        ->from('Pendapatan p')
                                                        ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                                                        ->where([
                                                          'sh.Date' => $penditem['Date'],
                                                          'sh.HelperId'=>$id,
                                                          'MONTH(sh.Date)' => $month,
                                                          'YEAR(sh.Date)' => $year,
                                                        ])
                                                        ->all()
                                                        ;

                                        foreach($modelPenddesc as $index => $itempend) {
                                        ?>
                                        <li><?= $itempend['Description'].': Rp. '.number_format($itempend['Amount'],0,'.',',') ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><span class="badge bg-green"><?= 'Rp. '.number_format($modelPendsum[0]['Amount'],0,'.',','); ?></span></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td style="width: 10px"><?= (count($modelPendapatan)+1)."."; ?></td>
                              <td style="width: 150px">Total Pembayaran</td>
                              <td></td>
                              <td style="width: 100px"><span class="badge bg-red"><?= 'Rp. '.number_format($modelSumPend['Amount'],0,'.',',')?></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Keterangan</th>
                              <th style="width: 150px">Harga Satuan</th>
                              <th style="width: 100px">Qty</th>
                              <th style="width: 100px">Total</th>
                            </tr>
                            <?php foreach($SO as $index => $soitems){ ?>
                            <?php
                            $soqty = $soitems['Qty'];
                            $totalsoqty = $SOSum['Qty'];

                            $TotalPriceSO = $hargaSatuan * $soqty;
                            $TotalPengSO = $totalsoqty * $hargaSatuan;

                            if($soitems['JenisId'] == 'G001')
                            {
                                $badge = 'badge bg-blue';
                            } else if ($soitems['JenisId'] == 'AQ001')
                            {
                                $badge = 'badge bg-aqua';
                            } else if ($soitems['JenisId'] == 'G002')
                            {
                                $badge = 'badge bg-green';
                            } else if ($soitems['JenisId'] == 'G003')
                            {
                                $badge = 'badge bg-yellow';
                            } else if ($soitems['JenisId'] == 'G004')
                            {
                                $badge = 'badge bg-red';
                            }


                            ?>
                            <tr>
                              <td><?= $index+1; ?>.</td>
                              <td>SO Tanggal <?= date('d F Y',strtotime($soitems['SODate'])); ?></td>
                              <td><?= 'Rp. '.number_format($hargaSatuan,0,'.',',')?></td>
                              <td><?= $soitems['Qty']; ?></td>
                              <td><span class="<?= $badge;?>"><?= 'Rp. '.number_format($TotalPriceSO,0,'.',','); ?></span></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td style="width: 10px"><?= (count($SO)+1)."."; ?></td>
                              <td style="width: 150px">Total Pengeluaran SO</td>
                              <td></td>
                              <td></td>
                              <td style="width: 100px"><span class="badge bg-red"><?= 'Rp. '.number_format($TotalPengSO,0,'.',',') ?></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#</th>
                              <th style="width: 150px">Tanggal</th>
                              <th>Keterangan</th>
                              <th style="width: 100px">Total</th>
                            </tr>
                            <?php foreach($modelPengeluaran as $index => $pengitem){ ?>
                            <tr>
                                <td><?= ($index+1)."."; ?></td>
                                <td><?= date('d-m-Y',strtotime($pengitem['Date'])); ?></td>
                                <td>
                                    <ul>
                                        <?php
                                        $modelPengdesc = Pengeluaran::find()
                                                        ->select("*")
                                                        ->from('Pengeluaran p')
                                                        ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                                                        ->where([
                                                          'sh.Date' => $pengitem['Date'],
                                                          'sh.HelperId'=>$id,
                                                          'MONTH(sh.Date)' => $month,
                                                          'YEAR(sh.Date)' => $year,
                                                        ])
                                                        ->all()
                                                        ;

                                        $modelPengsum = Pengeluaran::find()
                                                        ->select("sum(p.Amount) as Amount")
                                                        ->from('Pengeluaran p')
                                                        ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                                                        ->where([
                                                          'sh.Date' => $pengitem['Date'],
                                                          'sh.HelperId'=>$id,
                                                          'MONTH(sh.Date)' => $month,
                                                          'YEAR(sh.Date)' => $year,
                                                        ])
                                                        ->all()
                                                        ;
                                        $modelSumPeng = Pengeluaran::find()
                                                        ->select("sum(p.Amount) as Amount")
                                                        ->from('Pengeluaran p')
                                                        ->leftJoin("SetoranH sh",'sh.SetoranIdH = p.SetoranIdH')
                                                        ->where([
                                                          'MONTH(sh.Date)' => $month,
                                                          'YEAR(sh.Date)' => $year,
                                                          'sh.HelperId'=>$id
                                                        ])
                                                        ->one()
                                                        ;

                                        foreach($modelPengdesc as $index => $itempeng) {
                                        ?>
                                        <li><?= $itempeng['Description'].': Rp. '.number_format($itempeng['Amount'],0,'.',',') ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><span class="badge bg-green"><?= 'Rp. '.number_format($modelPengsum[0]['Amount'],0,'.',','); ?></span></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td style="width: 10px"><?= (count($modelPengeluaran)+1)."."; ?></td>
                              <td style="width: 150px">Total Pengeluaran</td>
                              <td></td>
                              <td style="width: 100px"><span class="badge bg-red"><?= 'Rp. '.number_format($modelSumPeng['Amount'],0,'.',',')?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
</div>
