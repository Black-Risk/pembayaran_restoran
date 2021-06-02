<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Listhidangan */

$this->title = $model->namaHidangan;
$this->params['breadcrumbs'][] = ['label' => 'List Hidangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="listhidangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali ke List Hidangan', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->idHidangan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idHidangan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus menu makanan tersebut?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idHidangan',
            'namaHidangan',
            'hargaHidangan',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'image',
                'header' =>'Foto Hidangan',
                'format' => 'raw',
                'value' => function($data){
                    $path = Yii::getAlias('@showimage').'/gambar/listhidangan/'.$data->fotoHidangan;
                    return Html::img($path, ['width'=>'200px','height'=>'200px']);
                }
            ],
        ],
    ]) ?>

</div>
