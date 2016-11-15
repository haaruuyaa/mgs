<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranH */

$this->title = 'Update Pengeluaran H: ' . $model->PengeluaranIdH;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PengeluaranIdH, 'url' => ['view', 'id' => $model->PengeluaranIdH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengeluaran-h-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
