<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */

$this->title = 'Edit Username Karyawan : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'List Username', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userlogin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
