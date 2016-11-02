<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */

$this->title = 'Update Order D: ' . $model->OrderIdD;
$this->params['breadcrumbs'][] = ['label' => 'Order Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrderIdD, 'url' => ['view', 'id' => $model->OrderIdD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-d-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
