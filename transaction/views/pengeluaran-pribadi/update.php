<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranPribadi */

$this->title = 'Update Pengeluaran Pribadi: ' . $model->PengeluaranId;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PengeluaranId, 'url' => ['view', 'id' => $model->PengeluaranId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengeluaran-pribadi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
