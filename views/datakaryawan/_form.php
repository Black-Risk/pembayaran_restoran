<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ButtonGroup;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Kotalahir;
use app\models\Listagama;
use kartik\file\FileInput;

//memanggil semua data dari database table Kotalahir
$Kotalahir = Kotalahir::find()->orderBy(['namaKota'=>SORT_ASC])->all();
$listKota = ArrayHelper::map($Kotalahir,'idKota','namaKota');

//memanggil semua data dari database table Listagama
$Listagama = Listagama::find()->all();
$dataAgama = ArrayHelper::map($Listagama,'idAgama','Agama');

/* @var $this yii\web\View */
/* @var $model app\models\Datakaryawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datakaryawan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput([
        'maxlength' => true,
        'placeholder' => 'Masukkan username karyawan (digunakan untuk login aplikasi kasir)',
        '‘readonly' => !$model->isNewRecord,
        ]) ?>

    <?= $form->field($model, 'namaKaryawan')->textInput([
        'maxlength' => true,
        'placeholder' => 'Masukkan nama lengkap karyawan',
        ]) ?>

    <?= $form->field($model, 'jkelaminKaryawan')->dropdownList ([
                1 => 'Laki-Laki', 
                2 => 'Perempuan',
        ]) ?>

    <? /*sumber untuk yii2-widget-select2 https://www.youtube.com/watch?v=V8RUuh6G-0w */ ?>
    <?= $form->field($model, 'tempatlahirKaryawan')->widget(Select2::classname(), [
            'data' => $listKota,
            'options' => ['placeholder' => 'Silahkan Pilih Kota Lahir'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

    <?= $form->field($model, 'tgllahirKaryawan')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan tanggal lahir karyawan tersebut'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'todayHighlight' => false,
            ]
         ]) ?>

    <?= $form->field($model, 'agamaKaryawan')->widget(Select2::classname(), [
            'data' => $dataAgama,
            'options' => ['placeholder' => 'Silahkan pilih kota lahir karyawan'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

    <?= $form->field($model, 'alamatKaryawan')->textInput([
        'maxlength' => true,
        'placeholder' => 'Masukkan alamat lengkap karyawan',
        ]) ?>

    <?= $form->field($model, 'statusKaryawan')->textInput([
        'maxlength' => true,
        ]) ?>

    <?= $form->field($model, 'nohpKaryawan')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'placeholder' => 'Masukkan nomor HP karyawan',
        ]) ?>

    <?= $form->field($model, 'fotoKaryawan')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*',
                    'multiple' => false],
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?
echo $username;
echo $namaKaryawan;
echo $jkelaminKaryawan;
echo $tempatlahirKaryawan;
echo $tgllahirKaryawan;
echo $agamaKaryawan;
echo $alamatKaryawan;
echo $statusKaryawan;
echo $nohpKaryawan;
?>