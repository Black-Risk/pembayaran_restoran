<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatakaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datakaryawan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Baru Data Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Masuk List Username', ['/userlogin/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

            //'username',

            //namaKaryawan
            [
                'attribute' => 'namaKaryawan',
                'label' => 'Nama Karyawan',
                'contentOptions' => ['style' => 'width:30%'],
                'headerOptions' => ['class' => 'text-center']
            ],
            
            //'jkelaminKaryawan',
            //'tempatlahirKaryawan',
            //'tgllahirKaryawan',
            //'agamaKaryawan',
            //'alamatKaryawan',

            //statusKaryawan,
            [
                'attribute' => 'statusKaryawan',
                'label' => 'Status Karyawan',
                'contentOptions' => ['style' => 'width:30%'],
                'headerOptions' => ['class' => 'text-center']
            ],

            //'nohpKaryawan',
            //'fotoKaryawan',

            //Action Column
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:10%', 'class' => 'text-center'],
            ],
        ],
    ]); ?>


</div>
