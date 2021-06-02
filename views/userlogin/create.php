<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */

$this->title = 'Signup Username Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'List Username', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlogin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
