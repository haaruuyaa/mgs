<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Soh */

$this->title = 'Update Soh: ' . $model->SOIDH;
$this->params['breadcrumbs'][] = ['label' => 'Sohs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SOIDH, 'url' => ['view', 'id' => $model->SOIDH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="soh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
