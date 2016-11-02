<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */

$this->title = 'Update Order H: ' . $model->OrderIdH;
$this->params['breadcrumbs'][] = ['label' => 'Order Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrderIdH, 'url' => ['view', 'id' => $model->OrderIdH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-h-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
