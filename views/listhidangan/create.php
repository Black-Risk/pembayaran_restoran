<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listhidangan */

$this->title = 'Buat Baru Menu Hidangan';
$this->params['breadcrumbs'][] = ['label' => 'List Hidangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listhidangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
