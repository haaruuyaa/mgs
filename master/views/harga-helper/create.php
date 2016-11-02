<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */

$this->title = 'Create Harga Helper';
$this->params['breadcrumbs'][] = ['label' => 'Harga Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-helper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
