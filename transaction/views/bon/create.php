<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\Bon */

$this->title = 'Buat Bon';
$this->params['breadcrumbs'][] = ['label' => 'Bons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bon-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
