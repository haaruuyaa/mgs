<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\So */

$this->title = 'Create So';
$this->params['breadcrumbs'][] = ['label' => 'Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="so-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
