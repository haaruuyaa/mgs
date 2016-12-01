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

$month = Yii::$app->request->get('month',date('m'));
$year = Yii::$app->request->get('year',date('o'));

?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-xs-12">
            <?= $this->render('_search'); ?>
        </div>
        <?php foreach($modelHelper as $helper){ ?>
        <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-green">
                    <div class="widget-user-image">
                        <img class="img-circle" src="img/default-50x50.gif" alt="User Avatar">
                    </div><!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?= $helper['HelperName']; ?></h3>
                    <h5 class="widget-user-desc">Murni Gas</h5>
                    <?= Html::a('Detail', ['default/report-helper-detail','id'=>$helper['HelperId'],'year' =>$year,'month' => $month], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php
                        
                        $modelJenis = MasterJenis::find()->all();
                        
                        ?>
                        <?php foreach($modelJenis as $index => $jenis){ ?>
                            <?php  
                                $modelTotalPenjualan = SetoranD::find()
                                ->select("SUM(sd.Qty) as Qty,sh.Date")
                                ->from("SetoranD sd")
                                ->leftJoin('SetoranH sh','sh.SetoranIdH = sd.SetoranIdH')
                                ->where([
                                        'sh.HelperId' => $helper['HelperId'],
                                        'sd.JenisId'=> $jenis['JenisId'],
                                        'MONTH(sh.Date)' => $month,
                                        'YEAR(sh.Date)' => $year
                                        ])->one();
                                
                                if($jenis['JenisId'] == 'G001')
                                {
                                    $badge = 'pull-right badge bg-blue';
                                } else if ($jenis['JenisId'] == 'AQ001')
                                {
                                    $badge = 'pull-right badge bg-aqua';
                                } else if ($jenis['JenisId'] == 'G002')
                                {
                                    $badge = 'pull-right badge bg-green';
                                } else if ($jenis['JenisId'] == 'G003')
                                {
                                    $badge = 'pull-right badge bg-yellow';
                                } else if ($jenis['JenisId'] == 'G004')
                                {
                                    $badge = 'pull-right badge bg-red';
                                } 
                            ?>
                            <li><a href="#"><?= $jenis['JenisName'] ?><span class="<?= $badge; ?>"><?= $modelTotalPenjualan['Qty']; ?></span></a></li>
                        <?php } ?>                            
                    </ul>
                </div>
            </div><!-- /.widget-user -->
        </div><!-- /.col -->
        <?php } ?>
    </div>
</div>