<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListhidanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Hidangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listhidangan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Baru Menu Hidangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //Urutan Nomor
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'contentOptions' => ['style' => 'width:5%', 'class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center']
            ],

            //idHidangan
            [
                'attribute' => 'idHidangan',
                'label' => 'ID Hidangan',
                'contentOptions' => ['style' => 'width:10%', 'class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center']
            ],

            //namaHidangan
            [
                'attribute' => 'namaHidangan',
                'label' => 'Nama Hidangan',
                'contentOptions' => ['style' => 'width:45%', 'class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center']
            ],

            //hargaHidangan
            [
                'attribute' => 'hargaHidangan',
                'label' => 'Harga Hidangan',
                'contentOptions' => ['style' => 'width:4%', 'class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center']
            ],

            //fotoHidangan
            [
                'class' => 'yii\grid\DataColumn',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'attribute' => 'image',
                'header' =>'Foto Hidangan',
                'format' => 'raw',
                'value' => function($data){
                    $path = Yii::getAlias('@showimage').'/gambar/listhidangan/'.$data->fotoHidangan;
                    return Html::img($path, ['width'=>'200px','height'=>'200px']);
                }
            ],

            //Action Column
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>


</div>
