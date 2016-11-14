<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */

$this->title = 'Buat Orderan';
$this->params['breadcrumbs'][] = ['label' => 'Order Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-h-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
