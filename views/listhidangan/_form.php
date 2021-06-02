<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Listhidangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listhidangan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'idHidangan')->textInput([
        'placeholder' => 'Masukkan ID menu hidangan',
        'type' => 'number',
        ]) ?>

    <?= $form->field($model, 'namaHidangan')->textInput([
        'maxlength' => true,
        'placeholder' => 'Masukkan nama menu hidangan'
        ]) ?>

    <?= $form->field($model, 'hargaHidangan')->textInput([
        'placeholder' => 'Masukkan harga menu hidangan',
        'type' => 'number',
        ]) ?>

    <?= $form->field($model, 'fotoHidangan')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*',
                    'multiple' => false,
                    'id' => 'fotoHidangan',],
        'pluginOptions' => [
                    'showPreview'           => true,
                    'showUpload'            => true,
                    'uploadAsync'           => true,
                    'showMessage'           => true,],
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
