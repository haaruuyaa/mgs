<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */

$this->title = 'Create Harga Customer';
$this->params['breadcrumbs'][] = ['label' => 'Harga Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
