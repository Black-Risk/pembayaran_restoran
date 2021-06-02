<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayattransaksi".
 *
 * @property int $idPesanan
 * @property string $listPesanan
 * @property string $waktuPesanan
 */
class Riwayattransaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayattransaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['listPesanan'], 'required'],
            [['waktuPesanan'], 'safe'],
            [['listPesanan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPesanan' => 'Id Pesanan',
            'listPesanan' => 'List Pesanan',
            'waktuPesanan' => 'Waktu Pembayaran Pesanan',
        ];
    }
}
