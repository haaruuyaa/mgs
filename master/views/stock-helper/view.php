<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelper */

$this->title = $model->StockHelpId;
$this->params['breadcrumbs'][] = ['label' => 'Stock Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-helper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->StockHelpId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->StockHelpId], [
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
            'StockHelpId',
            'HelperId',
            'JenisId',
            'Isi',
            'Kosong',
            'DateAdd',
            'DateUpdate',
            'DateCrt',
        ],
    ]) ?>

</div>
