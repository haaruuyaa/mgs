<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */

$this->title = 'Buat SO';
$this->params['breadcrumbs'][] = ['label' => 'Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="so-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
