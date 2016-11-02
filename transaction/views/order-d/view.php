<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderD */

$this->title = $model->OrderIdD;
$this->params['breadcrumbs'][] = ['label' => 'Order Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-d-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->OrderIdD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->OrderIdD], [
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
            'OrderIdD',
            'OrderIdH',
            'CustomerId',
            'JenisId',
            'IDHC',
            'Qty',
            'DateCrt',
            'DateUpdate',
        ],
    ]) ?>

</div>
