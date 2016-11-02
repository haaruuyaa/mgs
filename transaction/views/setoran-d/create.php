<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */

$this->title = 'Create Setoran D';
$this->params['breadcrumbs'][] = ['label' => 'Setoran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-d-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
