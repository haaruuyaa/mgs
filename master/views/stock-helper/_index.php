<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\master\models\MasterHelper;
use app\master\models\MasterJenis;
/* @var $this yii\web\View */
/* @var $searchModel app\master\models\StockHelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Helper';
$this->params['breadcrumbs'][] = $this->title;

$modelHelper = MasterHelper::find()->where(['<>','HelperId','A005'])->all();
?>
<div class="stock-helper-index">
    <div class="row">
    <?php foreach($modelHelper as $helper){ ?>
        <div class="col-md-3">
              <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-green">
                    <div class="widget-user-image">
                        <img class="img-circle" src="img/default-50x50.gif" alt="User Avatar">
                    </div><!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?= $helper['HelperName']; ?></h3>
                    <h5 class="widget-user-desc">Murni Gas</h5>
                    <?= Html::a('Detail', ['detail','id'=>$helper['HelperId']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div><!-- /.widget-user -->
        </div><!-- /.col -->
        <?php } ?>
    </div>
</div>
