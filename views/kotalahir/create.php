<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kotalahir */

$this->title = 'Create Kotalahir';
$this->params['breadcrumbs'][] = ['label' => 'Kotalahirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kotalahir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
