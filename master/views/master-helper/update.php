<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\master\models\MasterHelper */

$this->title = 'Update Master Helper: ' . $model->HelperId;
$this->params['breadcrumbs'][] = ['label' => 'Master Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->HelperId, 'url' => ['view', 'id' => $model->HelperId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-helper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
