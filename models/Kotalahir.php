<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kotalahir".
 *
 * @property string $idKota
 * @property string $namaKota
 */
class Kotalahir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kotalahir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idKota', 'namaKota'], 'required'],
            [['idKota'], 'string', 'max' => 4],
            [['namaKota'], 'string', 'max' => 100],
            [['idKota'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idKota' => 'Id Kota',
            'namaKota' => 'Nama Kota',
        ];
    }
}
