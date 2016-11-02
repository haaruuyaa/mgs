<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\OrderH */

$this->title = 'Create Order H';
$this->params['breadcrumbs'][] = ['label' => 'Order Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-h-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
