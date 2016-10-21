<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\Customer */

$this->title = 'Update Customer: ' . $model->customerid;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customerid, 'url' => ['view', 'id' => $model->customerid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
