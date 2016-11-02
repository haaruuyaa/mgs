<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\MasterHelper */

$this->title = 'Create Master Helper';
$this->params['breadcrumbs'][] = ['label' => 'Master Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-helper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
