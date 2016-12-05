<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Bon */

$this->title = 'Update Bon: ' . $model->BonId;
$this->params['breadcrumbs'][] = ['label' => 'Bons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BonId, 'url' => ['view', 'id' => $model->BonId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
