<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\transaction\models\PengeluaranPribadi */

$this->title = 'Buat Pengeluaran Pribadi';
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-pribadi-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
