<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */

$this->title = 'Create Setoran H';
$this->params['breadcrumbs'][] = ['label' => 'Setoran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-h-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
