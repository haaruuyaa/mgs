<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\Helper */

$this->title = 'Update Helper: ' . $model->helperid;
$this->params['breadcrumbs'][] = ['label' => 'Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->helperid, 'url' => ['view', 'id' => $model->helperid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="helper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
