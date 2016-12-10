<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\master\models\MasterHelper;
/* @var $this yii\web\View */
/* @var $model app\transaction\models\Bon */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Bayar Bon';

$helper = $model->HelperId;

$masterhelper = MasterHelper::find()->where(['HelperId' => $helper])->one();

$helpername = $masterhelper['HelperName'];
?>

<div class="bon-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-3">Helper</label>
                    <div class="col-xs-9">
                        <?= Html::textInput('helpername', $helpername, ['class' => 'form-group form-control','readonly' => true]) ?>
                    </div>
                    <label class="col-xs-3">Keterangan</label>
                    <div class="col-xs-9">
                        <?= Html::textInput('description', $model->Description, ['class' => 'form-group form-control','readonly' => true]) ?>
                    </div>
                    <label class="col-xs-3">Jumlah</label>
                    <div class="col-xs-9">
                        <?= Html::textInput('amount', $model->Amount, ['class' => 'form-group form-control','readonly' => true]) ?>
                    </div>
                    <label class="col-xs-3">Tanggal</label>
                    <div class="col-xs-9">
                        <?= $form->field($model, 'DatePaid')->widget(Datepicker::classname(),[
                            'options' => ['placeholder' => 'Masukan Tanggal Bayar ...'],
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
            <?= Html::a('Back', ['index'],['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
</div>
