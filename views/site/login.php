<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login Akun Restaurant BlackRisk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <br><br>

    <!-- <p>Please fill out the following fields to login:</p> -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-9\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'style'=>'width:100%',
        ]) ?>

        <?= $form->field($model, 'password')->passwordInput([
            'style'=>'width:100%',
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

  <!--  <div class="col-lg-offset-1" style="color:#999;">
        Silahkan masuk sebagai username dan password : <strong>root/root</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.<br>
        <strong>NOTE : SUDAH DI MODIF YANG BISA LOGIN DENGAN HASH OLEH Yii2</strong>
    </div> -->
</div>
