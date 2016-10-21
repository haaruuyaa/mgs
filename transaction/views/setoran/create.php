<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\Setoran */

$this->title = 'Buat Setoran';
$this->params['breadcrumbs'][] = ['label' => 'Setorans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
