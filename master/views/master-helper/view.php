<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterHelper */

$this->title = $model->HelperId;
$this->params['breadcrumbs'][] = ['label' => 'Master Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-helper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->HelperId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->HelperId], [
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
            'HelperId',
            'HelperName',
            'HelperPhone',
        ],
    ]) ?>

</div>
