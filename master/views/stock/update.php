<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\Stock */

$this->title = 'Update Stock: ' . $model->stockid;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stockid, 'url' => ['view', 'id' => $model->stockid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
