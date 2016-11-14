<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\master\models\MasterHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */
/* @var $form yii\widgets\ActiveForm */

$modalHelper = MasterHelper::find()->all();
$arrayHelper = ArrayHelper::map($modalHelper,'HelperId','HelperName');

?>

<div class="setoran-h-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-2">Helper</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'HelperId')->widget(Select2::classname(),[
                            'options' => ['prompt' => 'Pilih Helper ...'],
                            'data' => $arrayHelper
                        ])->label(false) ?>
                    </div>
                    <label class="col-xs-2">Tanggal</label>
                    <div class="col-xs-10">
                        <?= $form->field($model, 'Date')->widget(DatePicker::classname(),[
                            'options' => ['placeholder' => 'Masukan Tanggal Setor ...'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'todayHighlight' => true
                            ]
                        ])->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
