<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listhidangan */

$this->title = 'Ubah Data Menu Hidangan: ' . $model->namaHidangan;
$this->params['breadcrumbs'][] = ['label' => 'List Hidangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idHidangan, 'url' => ['view', 'id' => $model->idHidangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="listhidangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
