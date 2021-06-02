<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listagama */

$this->title = 'Update Listagama: ' . $model->idAgama;
$this->params['breadcrumbs'][] = ['label' => 'Listagamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAgama, 'url' => ['view', 'id' => $model->idAgama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="listagama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
