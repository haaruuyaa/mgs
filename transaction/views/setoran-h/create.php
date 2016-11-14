<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\SetoranH */

$this->title = 'Buat Setoran';
$this->params['breadcrumbs'][] = ['label' => 'Setoran Hs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-h-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
