<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\Sod */

$this->title = 'Buat So';
$this->params['breadcrumbs'][] = ['label' => 'Sods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sod-create">  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
