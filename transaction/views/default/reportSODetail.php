<?php

use yii\helpers\Html;
use app\master\models\MasterJenis;
use app\master\models\MasterNet;
use app\transaction\models\Sod;
/* @var $this yii\web\View */
/* @var $searchModel app\transaction\models\SetoranHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan SO';
$this->params['breadcrumbs'][] = $this->title;

$id = Yii::$app->request->get('id','xxx');
$month = Yii::$app->request->get('month',date('m'));
$year = Yii::$app->request->get('year',date('o'));

$arrTotal = [];
$masterjenis = MasterJenis::find()
        ->select("*")
        ->from("MasterJenis mj")
        ->leftJoin("MasterStock ms",'ms.JenisId = mj.JenisId')
        ->where([
          'mj.JenisId' => $id
        ])
        ->one()
        ;
$sod = Sod::find()
        ->select("*")
        ->from("Sod")
        ->leftJoin("Soh","Soh.SOIDH = Sod.SOIDH")
        ->where([
          'Sod.JenisId' => $id,
          'MONTH(Soh.SODate)' => $month,
          'YEAR(Soh.SODate)' => $year,
        ])
        ->orderBy(['Soh.SODate' => SORT_ASC])
        ->all();
$harganet = MasterNet::find()->where(['JenisId' => $id])->one();

?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-md-3">

              <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="img/default-50x50.gif" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= ucfirst(strtolower($masterjenis['JenisName'])); ?></h3>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Stock Total <?= $masterjenis['JenisName']; ?></b> <a class="pull-right"><?= $masterjenis['StockTotal']; ?></a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Tanggal</th>
                          <th style="width: 40px">Qty</th>
                          <th style="width: 40px">Harga Satuan</th>
                          <th style="width: 40px">Total</th>
                        </tr>
                        <?php foreach($sod as $index => $items){ ?>
                        <?php
                            $TotalPrice = $items['Qty'] * $harganet['Price'];

                            if($items['JenisId'] == 'G001')
                            {
                                $badge = 'badge bg-blue';
                            } else if ($items['JenisId'] == 'AQ001')
                            {
                                $badge = 'badge bg-aqua';
                            } else if ($items['JenisId'] == 'G002')
                            {
                                $badge = 'badge bg-green';
                            } else if ($items['JenisId'] == 'G003')
                            {
                                $badge = 'badge bg-yellow';
                            } else if ($items['JenisId'] == 'G004')
                            {
                                $badge = 'badge bg-red';
                            }
                        ?>
                        <tr>
                          <td><?= $index+1 ?>.</td>
                          <td><?= date("d F Y",strtotime($items['SODate'])); ?></td>
                          <td><?= $items['Qty']; ?></td>
                          <td><span class="<?= $badge; ?>"><?= 'Rp. '.number_format($harganet['Price'],0,'.',','); ?></span></td>
                          <td><span class="badge bg-purple-gradient"><?= 'Rp. '.number_format($TotalPrice,0,'.',','); ?></span></td>
                        </tr>
                        <?php array_push($arrTotal,$TotalPrice); } $TotalPriceSo = array_sum($arrTotal); ?>
                        <tr>
                          <td><?= (count($sod)+1) ?>.</td>
                          <td>Total</td>
                          <td></td>
                          <td></td>
                          <td><span class="badge bg-red"><?= 'Rp. '.number_format($TotalPriceSo,0,'.',','); ?></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div>
