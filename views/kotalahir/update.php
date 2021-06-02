<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kotalahir */

$this->title = 'Update Kotalahir: ' . $model->idKota;
$this->params['breadcrumbs'][] = ['label' => 'Kotalahirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idKota, 'url' => ['view', 'id' => $model->idKota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kotalahir-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
