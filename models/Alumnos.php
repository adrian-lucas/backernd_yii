<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%alumnos}}".
 *
 * @property int $id
 * @property string $nombre
 * @property float $codsis
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'codsis'], 'required'],
            [['nombre'], 'string'],
            [['codsis'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'codsis' => 'Codsis',
        ];
    }
}
