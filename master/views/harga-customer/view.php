<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaCustomer */

$this->title = $model->HCID;
$this->params['breadcrumbs'][] = ['label' => 'Harga Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->HCID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->HCID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'HCID',
            'CustomerId',
            'Price',
        ],
    ]) ?>

</div>
