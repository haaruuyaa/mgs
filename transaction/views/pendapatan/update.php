<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Pendapatan */

$this->title = 'Update Pendapatan: ' . $model->PendapatanId;
$this->params['breadcrumbs'][] = ['label' => 'Pendapatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PendapatanId, 'url' => ['view', 'id' => $model->PendapatanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendapatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
