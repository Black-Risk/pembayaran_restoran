<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Kotalahir;

/* @var $this yii\web\View */
/* @var $model app\models\Datakaryawan */

$this->title = $model->namaKaryawan;
$this->params['breadcrumbs'][] = ['label' => 'Data Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datakaryawan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali ke List Karyawan', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->username], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus data tersebut?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?php
    $sql1 = "SELECT `namaKota` FROM `kotalahir` WHERE `idKota` = $model->tempatlahirKaryawan ";
    

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'namaKaryawan',

            //jkelaminKaryawan
            [
                'attribute' => 'jkelaminKaryawan',
                'value' => function($model){
                             if($model->jkelaminKaryawan == '1'){
                                return 'Laki-Laki';
                             }
                             if($model->jkelaminKaryawan == '2'){
                                return 'Perempuan';
                             }
                             else{
                                 return 'Tidak diketahui';
                             }
                            }
            ],

            //tempatlahirKaryawan,
            [
                'attribute' => 'tempatlahirKaryawan',
                'value' => function($model){
                                $sql = (new \yii\db\Query())
                                    ->select(['namaKota'])
                                    ->from('kotalahir')
                                    ->where(['idKota' => $model->tempatlahirKaryawan])
                                    ->all();

                                foreach($sql as $namaKota) {
                                    return $namaKota['namaKota'];
                                }
                            }
            ],
            'tgllahirKaryawan',
            //'agamaKaryawan',
            [
                'attribute' => 'agamaKaryawan',
                'value' => function($model){
                                $sql = (new \yii\db\Query())
                                    ->select(['Agama'])
                                    ->from('listagama')
                                    ->where(['idAgama' => $model->agamaKaryawan])
                                    ->all();

                                foreach($sql as $Agama) {
                                    return $Agama['Agama'];
                                }
                            }
            ],

            'alamatKaryawan',
            'statusKaryawan',
            'nohpKaryawan',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'image',
                'header' =>'Foto Karyawan',
                'format' => 'raw',
                'value' => function($data){
                    $path = Yii::getAlias('@showimage').'/gambar/datakaryawan/'.$data->fotoKaryawan;
                    return Html::img($path, ['width'=>'200px','height'=>'200px']);
                }
            ],
        ],
    ]) ?>

</div>
