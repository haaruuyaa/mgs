<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */

$this->title = $model->HHID;
$this->params['breadcrumbs'][] = ['label' => 'Harga Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-helper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->HHID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->HHID], [
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
            'HHID',
            'HelperId',
            'Price',
        ],
    ]) ?>

</div>
