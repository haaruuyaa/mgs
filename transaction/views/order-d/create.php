<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */

$this->title = 'Buat Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'Order Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-d-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
