<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\Tipe */

$this->title = 'Update Tipe: ' . $model->tipeid;
$this->params['breadcrumbs'][] = ['label' => 'Tipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipeid, 'url' => ['view', 'id' => $model->tipeid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
