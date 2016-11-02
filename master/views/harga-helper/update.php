<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */

$this->title = 'Update Harga Helper: ' . $model->HHID;
$this->params['breadcrumbs'][] = ['label' => 'Harga Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->HHID, 'url' => ['view', 'id' => $model->HHID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="harga-helper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
