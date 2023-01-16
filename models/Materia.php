<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $id
 * @property string $codigi_sis
 * @property string $nombre
 *
 * @property AlumnoMateria[] $alumnoMaterias
 * @property Hora[] $horas
 * @property Nota[] $notas
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigi_sis', 'nombre'], 'required'],
            [['codigi_sis', 'nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigi_sis' => 'Codigi Sis',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[AlumnoMaterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoMaterias()
    {
        return $this->hasMany(AlumnoMateria::class, ['materia' => 'id']);
    }

    /**
     * Gets query for [[Horas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoras()
    {
        return $this->hasMany(Hora::class, ['materia' => 'id']);
    }

    /**
     * Gets query for [[Notas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::class, ['materia' => 'id']);
    }
}
