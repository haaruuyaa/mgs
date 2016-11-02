<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */

$this->title = 'Create Order D';
$this->params['breadcrumbs'][] = ['label' => 'Order Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-d-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
