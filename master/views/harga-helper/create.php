<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\HargaHelper */

$this->title = 'Buat Harga Helper';
$this->params['breadcrumbs'][] = ['label' => 'Harga Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-helper-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
