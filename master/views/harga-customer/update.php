<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */

$this->title = 'Update Harga Customer: ' . $model->HCID;
$this->params['breadcrumbs'][] = ['label' => 'Harga Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->HCID, 'url' => ['view', 'id' => $model->HCID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="harga-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
