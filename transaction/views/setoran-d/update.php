<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */

$this->title = 'Update Setoran D: ' . $model->SetoranIdD;
$this->params['breadcrumbs'][] = ['label' => 'Setoran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SetoranIdD, 'url' => ['view', 'id' => $model->SetoranIdD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setoran-d-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
