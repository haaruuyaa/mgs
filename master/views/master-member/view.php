<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterMember */

$this->title = $model->MemberId;
$this->params['breadcrumbs'][] = ['label' => 'Master Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MemberId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MemberId], [
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
            'MemberId',
            'MemberAddress',
            'CountBuy',
            'DateCrt',
        ],
    ]) ?>

</div>
