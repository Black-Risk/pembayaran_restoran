<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use  yii\validators\Validator;

/**
 * This is the model class for table "datakaryawan".
 *
 * @property string $username
 * @property string $namaKaryawan
 * @property string $jkelaminKaryawan
 * @property string $tempatlahirKaryawan
 * @property string $tgllahirKaryawan
 * @property string $agamaKaryawan
 * @property string $alamatKaryawan
 * @property string $statusKaryawan
 * @property string $nohpKaryawan
 * @property resource $fotoKaryawan
 *
 */
class Datakaryawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datakaryawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Silahkan masukkan username karyawan tersebut!'],
            ['namaKaryawan', 'required', 'message' => 'Silahkan masukkan nama karyawan tersebut!'],
            ['jkelaminKaryawan', 'required', 'message' => 'Silahkan pilih jenis kelamin karyawan tersebut!'],
            ['tempatlahirKaryawan', 'required', 'message' => 'Silahkan pilih kota tempat lahir karyawan tersebut!'],
            ['tgllahirKaryawan', 'required', 'message' => 'Silahkan masukkan/pilih tanggal lahir karyawan tersebut!'],
            ['agamaKaryawan', 'required', 'message' => 'Silahkan pilih agama karyawan tersebut!'],
            ['alamatKaryawan', 'required', 'message' => 'Silahkan masukkan alamat karyawan tersebut!'],
            ['statusKaryawan', 'required', 'message' => 'Silahkan masukkan status karyawan tersebut!'],
            ['nohpKaryawan', 'required', 'message' => 'Silahkan isi nomor HP karyawan tersebut!'],
            ['fotoKaryawan', 'required', 'message' => 'Silahkan masukkan/pilih foto karyawan tersebut!'],
            [['tgllahirKaryawan'], 'safe'],
            [['fotoKaryawan'], 'file', 'extensions'=>'jpg, jpeg, png', 'maxSize' => 1024 * 1024 * 20, 'on'=>'insert'],
            [['fotoKaryawan'], 'file', 'skipOnEmpty'=>true, 'extensions'=>'jpg, jpeg, png', 'maxSize' => 1024 * 1024 * 20, 'on'=>'update'],
            [['username', 'namaKaryawan'], 'string', 'max' => 128],
            [['jkelaminKaryawan'], 'string', 'max' => 1],
            [['tempatlahirKaryawan'], 'string', 'max' => 100],
            [['statusKaryawan'], 'string', 'max' => 100],
            [['agamaKaryawan'], 'string', 'max' => 10],
            [['alamatKaryawan'], 'string', 'max' => 255],
            [['nohpKaryawan'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'namaKaryawan' => 'Nama Karyawan',
            'jkelaminKaryawan' => 'Jenis Kelamin Karyawan',
            'tempatlahirKaryawan' => 'Tempat Lahir Karyawan',
            'tgllahirKaryawan' => 'Tanggal Lahir Karyawan',
            'agamaKaryawan' => 'Agama Karyawan',
            'alamatKaryawan' => 'Alamat Karyawan',
            'statusKaryawan' => 'Status Karyawan',
            'nohpKaryawan' => 'No HP Karyawan',
            'fotoKaryawan' => 'Foto Karyawan',
        ];
    }

    
}
