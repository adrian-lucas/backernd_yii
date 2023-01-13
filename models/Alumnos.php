<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $codsis
 *
 * @property AlumnoMateria[] $alumnoMaterias
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
            [['nombre', 'codsis'], 'string'],
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

    /**
     * Gets query for [[AlumnoMaterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoMaterias()
    {
        return $this->hasMany(AlumnoMateria::class, ['alumnos_id' => 'id']);
    }
}
