<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\transaction\models\SetoranH;
/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranHSearch */
/* @var $form yii\widgets\ActiveForm */

$arrayMonth = [
    '01' => 'January',
    '02' => 'February' ,
    '03' => 'March',
    '04'=> 'April',
    '05' => 'May',
    '06' => 'June',
    '07'=>'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'];

$yearnow = date('o');
$yearsetoran = SetoranH::find()
        ->select('YEAR(Date) as Year')
        ->distinct(true)
        ->from('SetoranH sh')->all();

$arraymap = ArrayHelper::map($yearsetoran,'Year','Year');

$month = Yii::$app->request->get('month',date('m'));
$year = Yii::$app->request->get('year',date('o'));
?>

<div class="setoran-h-search">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['report-customer'],
            'method' => 'get',
        ]); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Pilih Bulan"); ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-2">Bulan</label>
                    <div class="col-md-10">
                    <?= Select2::widget([
                        'name' => 'month',
                        'data' => $arrayMonth,
                        'value' => $month,
                        'options' => [
                            'placeholder' => 'Pilih Bulan ...'
                        ],
                    ]); ?>
                    </div>
                    <label class="col-md-2">Tahun</label>
                    <div class="col-md-10">
                    <?= Select2::widget([
                        'name' => 'year',
                        'data' => $arraymap,
                        'value' => $year,
                        'options' => [
                            'placeholder' => 'Pilih Tahun ...'
                        ],
                    ]); ?>
                    </div>
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Reset',['report-helper'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<br>
