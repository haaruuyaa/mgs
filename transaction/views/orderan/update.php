<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Orderan */

$this->title = 'Update Orderan: ' . $model->orderid;
$this->params['breadcrumbs'][] = ['label' => 'Orderans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orderid, 'url' => ['view', 'id' => $model->orderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
