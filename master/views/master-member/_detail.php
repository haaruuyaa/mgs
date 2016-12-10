<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\master\models\MasterMember;
use app\master\models\MasterMemberSearch;
/* @var $this yii\web\View */
/* @var $model app\master\models\MasterMember */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Detail Member';
$id = Yii::$app->request->get('id','xxx');

$dataMember = MasterMember::find()->where(['MemberId' => $id])->one();
$alamat = $dataMember['MemberAddress'];

?>

<div class="master-member-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title with-border"><?= Html::encode("Detail Data Member") ?></h1>
                </div>
                <div class="box-body">
                    <label class="col-xs-2">Alamat</label>
                    <div class="col-xs-10">
                      <?= Html::textInput('alamat',$alamat,['class' => 'form-group form-control','readonly' => true]); ?>
                    </div>
                    <label class="col-xs-2">Tanggal Pembelian</label>
                    <div class="col-xs-10">
                      <?php   ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <br>
    <div class="row">
      <div class="col-xs-12">
        <?php
          $searchModel = new MasterMemberSearch();
          $dataProvider = $searchModel->search($id);

          echo $this->render('indexdetail', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
          ]);
        ?>
      </div>
    </div>
</div>
