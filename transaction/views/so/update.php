<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */

$this->title = 'Update So: ' . $model->SOID;
$this->params['breadcrumbs'][] = ['label' => 'Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SOID, 'url' => ['view', 'id' => $model->SOID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="so-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
