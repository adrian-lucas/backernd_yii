<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno_materia".
 *
 * @property int $id
 * @property int $alumno
 * @property int $materia
 *
 * @property Alumno $alumno0
 * @property Materia $materia0
 */
class Alumno_Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno_materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alumno', 'materia'], 'required'],
            [['alumno', 'materia'], 'default', 'value' => null],
            [['alumno', 'materia'], 'integer'],
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
            'alumno' => 'Alumno',
            'materia' => 'Materia',
        ];
    }

    /**
     * Gets query for [[Alumo0]].
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
