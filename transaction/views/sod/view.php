<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Sod */

$this->title = $model->SOIDD;
$this->params['breadcrumbs'][] = ['label' => 'Sods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SOIDD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SOIDD], [
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
            'SOIDD',
            'SOIDH',
            'JenisId',
            'HelperId',
            'Qty',
            'DateCrt',
        ],
    ]) ?>

</div>
