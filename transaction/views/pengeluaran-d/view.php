<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranD */

$this->title = $model->PengeluaranIdD;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-d-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PengeluaranIdD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PengeluaranIdD], [
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
            'PengeluaranIdD',
            'PengeluaranIdH',
            'Amount',
            'Description',
            'DateCrt',
        ],
    ]) ?>

</div>
