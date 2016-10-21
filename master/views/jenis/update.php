<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\Jenis */

$this->title = 'Update Jenis: ' . $model->jenisid;
$this->params['breadcrumbs'][] = ['label' => 'Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenisid, 'url' => ['view', 'id' => $model->jenisid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
