<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\master\models\MasterMember */

$this->title = 'Tambah Pelanggan';
$this->params['breadcrumbs'][] = ['label' => 'Master Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-member-create">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
