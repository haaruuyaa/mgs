<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\Orderan */

$this->title = 'Create Orderan';
$this->params['breadcrumbs'][] = ['label' => 'Orderans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
