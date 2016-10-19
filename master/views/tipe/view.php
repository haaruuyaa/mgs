<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\Tipe */

$this->title = $model->tipeid;
$this->params['breadcrumbs'][] = ['label' => 'Tipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tipeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tipeid], [
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
            'tipeid',
            'tipename',
            'isactive:boolean',
        ],
    ]) ?>

</div>
