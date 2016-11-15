<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranD */

$this->title = 'Create Pengeluaran D';
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Ds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-d-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
