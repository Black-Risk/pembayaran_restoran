<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datakaryawan */

$this->title = 'Ubah Data Data Karyawan : ' . $model->namaKaryawan;
$this->params['breadcrumbs'][] = ['label' => 'Data Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datakaryawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
