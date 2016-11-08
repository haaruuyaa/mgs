<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Sod */

$this->title = 'Update Sod: ' . $model->SOIDD;
$this->params['breadcrumbs'][] = ['label' => 'Sods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SOIDD, 'url' => ['view', 'id' => $model->SOIDD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
