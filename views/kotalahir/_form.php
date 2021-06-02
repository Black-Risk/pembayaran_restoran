<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kotalahir */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kotalahir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idKota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namaKota')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
