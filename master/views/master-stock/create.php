<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\MasterStock */

$this->title = 'Master Stock';
$this->params['breadcrumbs'][] = ['label' => 'Master Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-stock-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
