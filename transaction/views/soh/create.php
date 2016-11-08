<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\Soh */

$this->title = 'Create Soh';
$this->params['breadcrumbs'][] = ['label' => 'Sohs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soh-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
