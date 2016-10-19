<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\Tipe */

$this->title = 'Create Tipe';
$this->params['breadcrumbs'][] = ['label' => 'Tipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
