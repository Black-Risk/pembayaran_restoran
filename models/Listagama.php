<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listagama".
 *
 * @property string $idAgama
 * @property string $Agama
 */
class Listagama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listagama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAgama', 'Agama'], 'required'],
            [['idAgama'], 'string', 'max' => 1],
            [['Agama'], 'string', 'max' => 15],
            [['idAgama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAgama' => 'Id Agama',
            'Agama' => 'Agama',
        ];
    }
}
