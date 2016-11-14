<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\transaction\models\Soh;
use app\transaction\models\SodSearch;
use app\master\models\MasterHelper;
use app\master\models\MasterJenis;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Sod */
/* @var $form yii\widgets\ActiveForm */

$SOIDH = Yii::$app->request->get('id','xxx');

$queryDate = Soh::find()->where(['SOIDH' => $SOIDH])->all();

$SODate = date('d F Y',strtotime($queryDate[0]['SODate']));

$modelHelper = MasterHelper::find()->all();
$dataListHelper = ArrayHelper::map($modelHelper,'HelperId','HelperName');
$modelJenis = MasterJenis::find()->all();
$dataListJenis = ArrayHelper::map($modelJenis,'JenisId','JenisName');
?>

<div class="sod-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <input type="hidden" value="<?= $SOIDH?>" name="soidh">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title." tanggal ".$SODate) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-md-2">Helper</label>
                    <div class="col-md-10">
                        <?= $form->field($model, 'HelperId')->widget(Select2::classname(),[
                            'options' => ['placeholder' => 'Pilih Helper ...'],
                            'data' => $dataListHelper
                        ])->label(false) ?>
                    </div>
                    <label class="col-md-2">Jenis</label>
                    <div class="col-md-10">
                        <?= $form->field($model, 'JenisId')->widget(Select2::classname(),[
                            'options' => ['placeholder' => 'Pilih Jenis ...'],
                            'data' => $dataListJenis
                        ])->label(false) ?>
                    </div>
                    <label class="col-md-2">Jumlah</label>
                    <div class="col-md-10">
                        <?= $form->field($model, 'Qty')->textInput()->label(false) ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back',['soh/index'], ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <br>
    <?php 
    $searchModel = new SodSearch();
    
    $dataProvider1 = $searchModel->searchSod($SOIDH);
    
    echo $this->render('index',[
        'dataProvider' => $dataProvider1,
    ]); 
    ?>
</div>
