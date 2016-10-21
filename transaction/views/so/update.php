<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */

$this->title = 'Update So: ' . $model->soid;
$this->params['breadcrumbs'][] = ['label' => 'Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->soid, 'url' => ['view', 'id' => $model->soid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="so-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
