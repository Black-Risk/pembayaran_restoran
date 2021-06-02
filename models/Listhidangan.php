<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use  yii\validators\Validator;

/**
 * This is the model class for table "listhidangan".
 *
 * @property string $idHidangan
 * @property string $namaHidangan
 * @property int $hargaHidangan
 * @property resource $fotoHidangan
 */
class Listhidangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listhidangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['idHidangan', 'required', 'skipOnError'=>false, 'message' => 'Silahkan isi ID hidangan!'],
            ['namaHidangan', 'required', 'message' => 'Silahkan isi nama hidangan!'],
            ['hargaHidangan', 'required', 'message' => 'Silahkan masukkan harga hidangan!'],
            ['fotoHidangan', 'required'],
            [['hargaHidangan'], 'string', 'max' => 6],
            [['fotoHidangan'], 'file','extensions'=>'jpg, jpeg, png', 'maxSize' => 1024 * 1024 * 20],
            [['namaHidangan'], 'string', 'max' => 128],
            [['idHidangan'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHidangan' => 'ID Hidangan',
            'namaHidangan' => 'Nama Hidangan',
            'hargaHidangan' => 'Harga Hidangan',
            'fotoHidangan' => 'Foto Hidangan',
        ];
    }

    
}
