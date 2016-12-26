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

if(!isset($date))
{
  $date = '';
} else {
  $date = $date;
}

?>
<div class="transaction-default-index">
    <div class="row">
        <div class="col-xs-12">
            <?= $this->render('_searchPengeluaranPribadi'); ?>
        </div>
        <?php if($date != '' OR $date != NULL) { ?>
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h1 class="box-title with-border"></h1>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                  <tr>
                    <th>No.</th>
                    <th>Helper</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                  </tr>
              </table>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
</div>
