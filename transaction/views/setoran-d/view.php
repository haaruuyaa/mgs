<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */

$this->title = $model->SetoranIdD;
$this->params['breadcrumbs'][] = ['label' => 'Setoran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-d-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SetoranIdD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SetoranIdD], [
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
            'SetoranIdD',
            'SetoranIdH',
            'JenisId',
            'HHID',
            'Qty',
            'DateCrt',
        ],
    ]) ?>

</div>
