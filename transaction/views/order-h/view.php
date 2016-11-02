<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */

$this->title = $model->OrderIdH;
$this->params['breadcrumbs'][] = ['label' => 'Order Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-h-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->OrderIdH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->OrderIdH], [
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
            'OrderIdH',
            'OrderDate',
            'DateCrt',
        ],
    ]) ?>

</div>
