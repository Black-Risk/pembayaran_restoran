<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatakaryawanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datakaryawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'namaKaryawan') ?>

    <?= $form->field($model, 'jkelaminKaryawan') ?>

    <?= $form->field($model, 'tempatlahirKaryawan') ?>

    <?= $form->field($model, 'tgllahirKaryawan') ?>

    <?php // echo $form->field($model, 'agamaKaryawan') ?>

    <?php // echo $form->field($model, 'alamatKaryawan') ?>

    <?php // echo $form->field($model, 'statusKaryawan') ?>

    <?php // echo $form->field($model, 'nohpKaryawan') ?>

    <?php // echo $form->field($model, 'fotoKaryawan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
