<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserloginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Username';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlogin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali ke List Data karyawan', ['/datakaryawan/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Daftar Login Username Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //namaKaryawan
            [
                'attribute' => 'namaKaryawan',
                'label' => 'Nama Karyawan',
                'contentOptions' => ['style' => 'width:50%'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function($model){
                                $sql = (new \yii\db\Query())
                                    ->select(['namaKaryawan'])
                                    ->from('datakaryawan')
                                    ->where(['username' => $model->username])
                                    ->all();

                                foreach($sql as $namaKaryawan) {
                                    return $namaKaryawan['namaKaryawan'];
                                }
                            }
            ],

            //'username',
            [
                'attribute' => 'username',
                'label' => 'Username Karyawan',
                'contentOptions' => ['style' => 'width:35%'],
                'headerOptions' => ['class' => 'text-center'],
            ],

            //'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
