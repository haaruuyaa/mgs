<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */

$this->title = 'Buat Harga Customer';
$this->params['breadcrumbs'][] = ['label' => 'Harga Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
