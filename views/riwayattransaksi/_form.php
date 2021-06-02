<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use app\models\Listhidangan;

//memanggil semua data dari database table Listagama
$Listhidangan = Listhidangan::find()->all();
$dataHidangan = ArrayHelper::map($Listhidangan,'idHidangan','namaHidangan');

$waktusekarang = date('Y-m-d h:i:s');

/* @var $this yii\web\View */
/* @var $model app\models\Riwayattransaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayattransaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'waktuPesanan')->widget(DateTimePicker::className(), [
        'options' => ['placeholder' => 'Silahkan klik form tanggal dan langsung klik "Today" '],
        'pluginOptions' => [
            'format' => 'yyyy-mm-d h:i:s',
            'todayBtn' => true,
            'autoclose' => true,
            'todayHighlight' => true,
            'minuteStep' => 1,
            'startDate' => '01-Mar-2014 12:00:00',
        ],
    ]); ?>

    <?= $form->field($model, 'listPesanan')->widget(Select2::classname(), [
            'data' => $dataHidangan,
            'options' => ['placeholder' => 'Silahkan pilih hidangan dan otomatis akan masuk ke list pesanan menu'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
