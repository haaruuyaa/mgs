<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranH */

$this->title = $model->PengeluaranIdH;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-h-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PengeluaranIdH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PengeluaranIdH], [
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
            'PengeluaranIdH',
            'SetoranIdH',
            'Date',
            'DateCrt',
        ],
    ]) ?>

</div>
