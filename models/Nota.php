<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota".
 *
 * @property int $id
 * @property string $gestion
 * @property int $alumno
 * @property int $materia
 * @property float $puntaje
 *
 * @property Alumno $alumno0
 * @property Materia $materia0
 */
class Nota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gestion', 'alumno', 'materia', 'puntaje'], 'required'],
            [['gestion'], 'string'],
            [['alumno', 'materia'], 'default', 'value' => null],
            [['alumno', 'materia'], 'integer'],
            [['puntaje'], 'number'],
            [['alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['alumno' => 'id']],
            [['materia'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::class, 'targetAttribute' => ['materia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gestion' => 'Gestion',
            'alumno' => 'Alumno',
            'materia' => 'Materia',
            'puntaje' => 'Puntaje',
        ];
    }

    /**
     * Gets query for [[Alumno0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno0()
    {
        return $this->hasOne(Alumno::class, ['id' => 'alumno']);
    }

    /**
     * Gets query for [[Materia0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateria0()
    {
        return $this->hasOne(Materia::class, ['id' => 'materia']);
    }
}
