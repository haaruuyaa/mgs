<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranD */

$this->title = 'Detail Setoran';
$this->params['breadcrumbs'][] = ['label' => 'Setoran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-d-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
