<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Riwayattransaksi */

$this->title = 'Update Riwayattransaksi: ' . $model->idPesanan;
$this->params['breadcrumbs'][] = ['label' => 'Riwayattransaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPesanan, 'url' => ['view', 'id' => $model->idPesanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayattransaksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
