<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterCustomer */

$this->title = 'Update Master Customer: ' . $model->CustomerId;
$this->params['breadcrumbs'][] = ['label' => 'Master Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CustomerId, 'url' => ['view', 'id' => $model->CustomerId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
