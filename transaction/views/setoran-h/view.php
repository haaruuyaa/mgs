<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */

$this->title = $model->SetoranIdH;
$this->params['breadcrumbs'][] = ['label' => 'Setoran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-h-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SetoranIdH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SetoranIdH], [
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
            'SetoranIdH',
            'HelperId',
            'Date',
            'DateCrt',
        ],
    ]) ?>

</div>
