<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\transaction\models\Setoran */

$this->title = 'Update Setoran: ' . $model->setoranid;
$this->params['breadcrumbs'][] = ['label' => 'Setorans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->setoranid, 'url' => ['view', 'id' => $model->setoranid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setoran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
