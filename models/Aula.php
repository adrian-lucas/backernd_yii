<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $id
 * @property string $nombre
 * @property string $capacidad
 *
 * @property Hora[] $horas
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'capacidad'], 'required'],
            [['nombre', 'capacidad'], 'string'],
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
            'capacidad' => 'Capacidad',
        ];
    }

    /**
     * Gets query for [[Horas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoras()
    {
        return $this->hasMany(Hora::class, ['aula' => 'id']);
    }
}
