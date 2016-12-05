<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Bon */

$this->title = $model->BonId;
$this->params['breadcrumbs'][] = ['label' => 'Bons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->BonId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->BonId], [
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
            'BonId',
            'Description',
            'Amount',
            'Date',
            'Tipe',
            'DateCrt',
        ],
    ]) ?>

</div>
