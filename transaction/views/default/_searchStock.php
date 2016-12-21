<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\Datepicker;
use app\master\models\MasterHelper;
/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranHSearch */
/* @var $form yii\widgets\ActiveForm */

$modelHelper = MasterHelper::find()->where(['<>','HelperId','A005'])->all();
$arrayHelper = ArrayHelper::map($modelHelper,'HelperId','HelperName');

?>

<div class="setoran-h-search">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['report-stock-history'],
            'method' => 'post',
        ]); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Pilih Bulan"); ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-2" style="margin-bottom:2%;">Tanggal</label>
                    <div class="col-md-10" style="margin-bottom:2%;">
                      <?= DatePicker::widget([
                          'name' => 'tanggal',
                          'options' => ['placeholder' => 'Pilih Tanggal ...'],
                          'pluginOptions' => [
                              'autoclose'=>true,
                              'format' => 'yyyy/mm/dd',
                              'todayHighlight' => true
                          ]
                        ]);
                        ?>
                    </div>
                    <label class="col-md-2" style="margin-bottom:2%;">Helper</label>
                    <div class="col-md-10" style="margin-bottom:2%;">
                      <?= Select2::widget([
                          'name' => 'helper',
                          'data' => $arrayHelper,
                          'options' => [
                              'placeholder' => 'Pilih Helper ...'
                          ],
                      ]); ?>
                    </div>
                    <div class="col-xs-12">
                      <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                      <?= Html::a('Reset',['report-stock-history'], ['class' => 'btn btn-default']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<br>
