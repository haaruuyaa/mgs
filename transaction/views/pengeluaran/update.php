<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Pengeluaran */

$this->title = 'Update Pengeluaran: ' . $model->PengeluaranId;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PengeluaranId, 'url' => ['view', 'id' => $model->PengeluaranId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengeluaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
