<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property int $id
 * @property string $codigo_sis
 * @property string $ci
 * @property string $nombres
 * @property string $apellidos
 * @property string $email
 * @property string $fecha_nacimiento
 * @property string $contrasenia
 *
 * @property AlumnoMateria[] $alumnoMaterias
 * @property Nota[] $notas
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_sis', 'ci', 'nombres', 'apellidos', 'email', 'fecha_nacimiento'], 'required'],
            [['codigo_sis', 'ci', 'nombres', 'apellidos', 'email', 'contrasenia'], 'string'],
            [['fecha_nacimiento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_sis' => 'Codigo Sis',
            'ci' => 'Ci',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'email' => 'Email',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'contrasenia' => 'Contrasenia',
        ];
    }

    /**
     * Gets query for [[AlumnoMaterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoMaterias()
    {
        return $this->hasMany(AlumnoMateria::class, ['alumno' => 'id']);
    }

    /**
     * Gets query for [[Notas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::class, ['alumno' => 'id']);
    }
}
