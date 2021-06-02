<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datakaryawan */

$this->title = 'Buat Baru Data Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Data Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datakaryawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
