<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Riwayattransaksi */

$this->title = 'Buat Baru Transaksi Pesanan Pelanggan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayattransaksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
