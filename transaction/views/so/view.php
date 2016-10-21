<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */

$this->title = $model->soid;
$this->params['breadcrumbs'][] = ['label' => 'Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="so-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->soid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->soid], [
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
            'soid',
            'sodate',
            'tipeid',
            'qty',
            'user',
            'usercrt',
            'datecrt',
        ],
    ]) ?>

</div>
