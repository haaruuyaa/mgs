<?php

use yii\helpers\Html;
use app\transaction\models\SetoranH;
use app\transaction\models\SetoranD;
use app\master\models\MasterHelper;
use app\master\models\MasterJenis;
use app\master\models\MasterCustomer;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pendapatan';
$this->params['breadcrumbs'][] = $this->title;

$modelHelper = MasterHelper::find()->where(['<>','HelperId','A005'])->all();
$modelHelperBGAQ5Kg = MasterHelper::find()->where(['not in','HelperId',['A005','A001']])->all();
$modelCustomer = MasterCustomer::find()->all();
?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Penjualan 3 Kg</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Penjualan 12 Kg</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Penjualan Blue Gas</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Penjualan Aqua</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Penjualan 5 Kg</a></li>
                  <li class="pull-right" style="margin-top:0.7%; margin-right: 1.5%;"><label class="text-muted">Laporan Penjualan Bulan <?= date('F') ?></label></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php foreach($modelHelper as $items){ ?>
                        <?php $modelSetoranD = SetoranH::find()->select('SUM(sd.Qty) as Qty')
                                              ->from('SetoranH sh')
                                              ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                              ->where(['sh.HelperId' => $items['HelperId'],'sd.JenisId' => 'G002'])
                                              ->andWhere(['MONTH(Date)' => date('m')])
                                              ->one();
                                $qty = $modelSetoranD['Qty'];
                                $arrpend = [];
                                $modelHarga = \app\master\models\HargaHelper::find()
                                        ->select('*')
                                        ->from('HargaHelper')
                                        ->where(['HelperId' => $items['HelperId'],'JenisId' => 'G002'])
                                        ->one();
                                $id = $modelHarga['HHID'];
                                $price = $modelHarga['Price'];
                                
                                $modelNet = app\master\models\MasterNet::find()->where(['JenisId' => 'G002'])->one();
                                $pricenet = $modelNet['Price'];
                                
                                $TotalJual = $qty * $price;
                                $TotalHargaDO = $qty * $pricenet;
                                $TotalUntung = $TotalJual - $TotalHargaDO;
                                      ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h1 class="box-title with-border"><?= Html::encode($items['HelperName']) ?></h1>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                      <th># Jumlah Terjual Sampai Saat Ini <?= $qty; ?> Tabung</th>
                                      <th>Satuan</th>
                                      <th>Total</th>
                                    </tr>
                                    <tr>
                                      <td>Harga Jual</td>
                                      <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                                      <td><label><span class="badge bg-blue"><?= number_format($TotalJual,0,'.',',');?></span></label></td>
                                    </tr>
                                    <tr>
                                      <td>Harga DO</td>
                                      <td><?= 'Rp. '.number_format($pricenet,0,'.',','); ?></td>                                      
                                      <td><span class="badge bg-red"><?= number_format($TotalHargaDO,0,'.',',');?></span></td>
                                    </tr>
                                    <tr>
                                      <td>Keuntungan</td>
                                      <td></td>                                      
                                      <td><span class="badge bg-green"><?= number_format($TotalUntung,0,'.',',');?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <?php foreach($modelHelper as $items){ ?>
                    <?php $modelSetoranD = SetoranH::find()->select('SUM(sd.Qty) as Qty')
                                          ->from('SetoranH sh')
                                          ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                          ->where(['sh.HelperId' => $items['HelperId'],'sd.JenisId' => 'G001'])
                                          ->andWhere(['MONTH(Date)' => date('m')])
                                          ->one();
                            $qty = $modelSetoranD['Qty'];
                            $arrpend = [];
                            $modelHarga = \app\master\models\HargaHelper::find()
                                    ->select('*')
                                    ->from('HargaHelper')
                                    ->where(['HelperId' => $items['HelperId'],'JenisId' => 'G001'])
                                    ->one();
                            $id = $modelHarga['HHID'];
                            $price = $modelHarga['Price'];

                            $modelNet = app\master\models\MasterNet::find()->where(['JenisId' => 'G001'])->one();
                            $pricenet = $modelNet['Price'];

                            $TotalJual = $qty * $price;
                            $TotalHargaDO = $qty * $pricenet;
                            $TotalUntung = $TotalJual - $TotalHargaDO;
                        ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h1 class="box-title with-border"><?= Html::encode($items['HelperName']) ?></h1>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                      <th># Jumlah Terjual Sampai Saat Ini <?= $qty; ?> Tabung</th>
                                      <th>Satuan</th>
                                      <th>Total</th>
                                    </tr>
                                    <tr>
                                      <td>Harga Jual</td>
                                      <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                                      <td><label><span class="badge bg-blue"><?= number_format($TotalJual,0,'.',',');?></span></label></td>
                                    </tr>
                                    <tr>
                                      <td>Harga DO</td>
                                      <td><?= 'Rp. '.number_format($pricenet,0,'.',','); ?></td>                                      
                                      <td><span class="badge bg-red"><?= number_format($TotalHargaDO,0,'.',',');?></span></td>
                                    </tr>
                                    <tr>
                                      <td>Keuntungan</td>
                                      <td></td>                                      
                                      <td><span class="badge bg-green"><?= number_format($TotalUntung,0,'.',',');?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <?php foreach($modelHelperBGAQ5Kg as $items){ ?>
                    <?php $modelSetoranD = SetoranH::find()->select('SUM(sd.Qty) as Qty')
                                      ->from('SetoranH sh')
                                      ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                      ->where(['sh.HelperId' => $items['HelperId'],'sd.JenisId' => 'G004'])
                                      ->andWhere(['MONTH(Date)' => date('m')])
                                      ->one();
                        $qty = $modelSetoranD['Qty'];
                        $arrpend = [];
                        $modelHarga = \app\master\models\HargaHelper::find()
                                ->select('*')
                                ->from('HargaHelper')
                                ->where(['HelperId' => $items['HelperId'],'JenisId' => 'G004'])
                                ->one();
                        $id = $modelHarga['HHID'];
                        $price = $modelHarga['Price'];

                        $modelNet = app\master\models\MasterNet::find()->where(['JenisId' => 'G004'])->one();
                        $pricenet = $modelNet['Price'];

                        $TotalJual = $qty * $price;
                        $TotalHargaDO = $qty * $pricenet;
                        $TotalUntung = $TotalJual - $TotalHargaDO;
                    ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h1 class="box-title with-border"><?= Html::encode($items['HelperName']) ?></h1>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                      <th># Jumlah Terjual Sampai Saat Ini <?= $qty; ?> Tabung</th>
                                      <th>Satuan</th>
                                      <th>Total</th>
                                    </tr>
                                    <tr>
                                      <td>Harga Jual</td>
                                      <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                                      <td><label><span class="badge bg-blue"><?= number_format($TotalJual,0,'.',',');?></span></label></td>
                                    </tr>
                                    <tr>
                                      <td>Harga DO</td>
                                      <td><?= 'Rp. '.number_format($pricenet,0,'.',','); ?></td>                                      
                                      <td><span class="badge bg-red"><?= number_format($TotalHargaDO,0,'.',',');?></span></td>
                                    </tr>
                                    <tr>
                                      <td>Keuntungan</td>
                                      <td></td>                                      
                                      <td><span class="badge bg-green"><?= number_format($TotalUntung,0,'.',',');?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    <?php foreach($modelHelperBGAQ5Kg as $items){ ?>
                    <?php $modelSetoranD = SetoranH::find()->select('SUM(sd.Qty) as Qty')
                                  ->from('SetoranH sh')
                                  ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                  ->where(['sh.HelperId' => $items['HelperId'],'sd.JenisId' => 'AQ001'])
                                  ->andWhere(['MONTH(Date)' => date('m')])
                                  ->one();
                    $qty = $modelSetoranD['Qty'];
                    $arrpend = [];
                    $modelHarga = \app\master\models\HargaHelper::find()
                            ->select('*')
                            ->from('HargaHelper')
                            ->where(['HelperId' => $items['HelperId'],'JenisId' => 'AQ001'])
                            ->one();
                    $id = $modelHarga['HHID'];
                    $price = $modelHarga['Price'];

                    $modelNet = app\master\models\MasterNet::find()->where(['JenisId' => 'AQ001'])->one();
                    $pricenet = $modelNet['Price'];

                    $TotalJual = $qty * $price;
                    $TotalHargaDO = $qty * $pricenet;
                    $TotalUntung = $TotalJual - $TotalHargaDO;
                    ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h1 class="box-title with-border"><?= Html::encode($items['HelperName']) ?></h1>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                      <th># Jumlah Terjual Sampai Saat Ini <?= $qty; ?> Galon</th>
                                      <th>Satuan</th>
                                      <th>Total</th>
                                    </tr>
                                    <tr>
                                      <td>Harga Jual</td>
                                      <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                                      <td><label><span class="badge bg-blue"><?= number_format($TotalJual,0,'.',',');?></span></label></td>
                                    </tr>
                                    <tr>
                                      <td>Harga DO</td>
                                      <td><?= 'Rp. '.number_format($pricenet,0,'.',','); ?></td>                                      
                                      <td><span class="badge bg-red"><?= number_format($TotalHargaDO,0,'.',',');?></span></td>
                                    </tr>
                                    <tr>
                                      <td>Keuntungan</td>
                                      <td></td>                                      
                                      <td><span class="badge bg-green"><?= number_format($TotalUntung,0,'.',',');?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                    <?php foreach($modelHelperBGAQ5Kg as $items){ ?>
                        <?php $modelSetoranD = SetoranH::find()->select('SUM(sd.Qty) as Qty')
                                  ->from('SetoranH sh')
                                  ->leftJoin('SetoranD sd','sd.SetoranIdH = sh.SetoranIdH')
                                  ->where(['sh.HelperId' => $items['HelperId'],'sd.JenisId' => 'G003'])
                                  ->andWhere(['MONTH(Date)' => date('m')])
                                  ->one();
                    $qty = $modelSetoranD['Qty'];
                    $arrpend = [];
                    $modelHarga = \app\master\models\HargaHelper::find()
                            ->select('*')
                            ->from('HargaHelper')
                            ->where(['HelperId' => $items['HelperId'],'JenisId' => 'G003'])
                            ->one();
                    $id = $modelHarga['HHID'];
                    $price = $modelHarga['Price'];

                    $modelNet = app\master\models\MasterNet::find()->where(['JenisId' => 'G003'])->one();
                    $pricenet = $modelNet['Price'];

                    $TotalJual = $qty * $price;
                    $TotalHargaDO = $qty * $pricenet;
                    $TotalUntung = $TotalJual - $TotalHargaDO;
                    ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h1 class="box-title with-border"><?= Html::encode($items['HelperName']) ?></h1>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                      <th># Jumlah Terjual Sampai Saat Ini <?= $qty; ?> Tabung</th>
                                      <th>Satuan</th>
                                      <th>Total</th>
                                    </tr>
                                    <tr>
                                      <td>Harga Jual</td>
                                      <td><?= 'Rp. '.number_format($price,0,'.',',')?></td>
                                      <td><label><span class="badge bg-blue"><?= number_format($TotalJual,0,'.',',');?></span></label></td>
                                    </tr>
                                    <tr>
                                      <td>Harga DO</td>
                                      <td><?= 'Rp. '.number_format($pricenet,0,'.',','); ?></td>                                      
                                      <td><span class="badge bg-red"><?= number_format($TotalHargaDO,0,'.',',');?></span></td>
                                    </tr>
                                    <tr>
                                      <td>Keuntungan</td>
                                      <td></td>                                      
                                      <td><span class="badge bg-green"><?= number_format($TotalUntung,0,'.',',');?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
        </div>
    </div>
</div>