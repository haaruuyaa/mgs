<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Soh */

$this->title = $model->SOIDH;
$this->params['breadcrumbs'][] = ['label' => 'Sohs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SOIDH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SOIDH], [
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
            'SOIDH',
            'SODate',
            'DateCrt',
        ],
    ]) ?>

</div>
