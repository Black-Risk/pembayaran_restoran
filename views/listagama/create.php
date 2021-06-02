<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listagama */

$this->title = 'Create Listagama';
$this->params['breadcrumbs'][] = ['label' => 'Listagamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listagama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
