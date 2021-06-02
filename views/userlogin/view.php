<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'List Username', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userlogin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->username], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus username tersebut?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //namaKaryawan
            [
                'attribute' => 'namaKaryawan',
                'label' => 'Nama Karyawan',
                'contentOptions' => ['style' => 'width:70%'],
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
                'contentOptions' => ['style' => 'width:70%'],
                'headerOptions' => ['class' => 'text-center'],
            ],

            //'password',
            [
                //'attribute' => 'password',
                'label' => 'Password',
                'value' => '(Password telah diset dan disembunyikan)',
                //'nullDisplay' => '(Password belum dibuat/terjadi error)',
            ]
        ],
    ]) ?>

</div>
