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

$this->title = 'Laporan SO';
$this->params['breadcrumbs'][] = $this->title;

$modelJenis = MasterJenis::find()->all();
?>
<div class="transaction-default-index">
    <div class="row">
        <?php foreach($modelJenis as $jenis){ ?>
        <?php
        if($jenis['JenisId'] == 'G001')
        {
            $badge = 'bg-blue';
        } else if ($jenis['JenisId'] == 'AQ001')
        {
            $badge = 'bg-aqua';
        } else if ($jenis['JenisId'] == 'G002')
        {
            $badge = 'bg-green';
        } else if ($jenis['JenisId'] == 'G003')
        {
            $badge = 'bg-yellow';
        } else if ($jenis['JenisId'] == 'G004')
        {
            $badge = 'bg-red';
        }
        
        ?>
        <div class="col-lg-6 col-xs-3">
            <!-- small box -->
            <div class="small-box <?=$badge?>">
                <div class="inner">
                    <h3><?= $jenis['JenisName'] ?></h3>
                    <p><?= $jenis['JenisId'] ?></p>
                </div>
                <div class="icon">
                    <i class="fa fa-database"></i>
                </div>
                <?= Html::a("More info <i class='fa fa-arrow-circle-right'></i>", ['default/report-so-detail','id' => $jenis['JenisId']], ['class' => 'small-box-footer']) ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>