<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */

$this->title = 'Update Setoran H: ' . $model->SetoranIdH;
$this->params['breadcrumbs'][] = ['label' => 'Setoran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SetoranIdH, 'url' => ['view', 'id' => $model->SetoranIdH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setoran-h-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
