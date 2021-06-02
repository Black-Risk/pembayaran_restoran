<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Datakaryawan;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\password\PasswordInput;

//memanggil semua data dari database table Listagama
$Listdatakaryawan = Datakaryawan::find()->all();
$datausername = ArrayHelper::map($Listdatakaryawan,'username','username','namaKaryawan');

/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userlogin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->widget(Select2::classname(), [
            'data' => $datausername,
            'options' => ['placeholder' => 'Silahkan Pilih Username Karyawan yang Ingin diregistrasi'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

    <?= $form->field($model, 'password')->widget(PasswordInput::classname(), [
            'pluginOptions' => [
                'showMeter' => true,
                'toggleMask' => true,
            ]
        ]) ?>

    <?= $form->field($model, 'password_repeat')->widget(PasswordInput::classname(), [
            'pluginOptions' => [
                'showMeter' => true,
                'toggleMask' => true,
            ]
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
