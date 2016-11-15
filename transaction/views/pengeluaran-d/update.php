<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranD */

$this->title = 'Update Pengeluaran D: ' . $model->PengeluaranIdD;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PengeluaranIdD, 'url' => ['view', 'id' => $model->PengeluaranIdD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengeluaran-d-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
