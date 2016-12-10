<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\StockHelper */

$this->title = 'Buat Stock Helper';
$this->params['breadcrumbs'][] = ['label' => 'Stock Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-helper-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
