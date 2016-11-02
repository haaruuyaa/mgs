<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterJenis */

$this->title = 'Update Master Jenis: ' . $model->JenisId;
$this->params['breadcrumbs'][] = ['label' => 'Master Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->JenisId, 'url' => ['view', 'id' => $model->JenisId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-jenis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
