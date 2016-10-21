<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\Helper */

$this->title = 'Tambah Helper';
$this->params['breadcrumbs'][] = ['label' => 'Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helper-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
