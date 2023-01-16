<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno_materia".
 *
 * @property int $id
 * @property int $alumo
 * @property int $materia
 *
 * @property Alumno $alumo0
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
            [['alumo', 'materia'], 'required'],
            [['alumo', 'materia'], 'default', 'value' => null],
            [['alumo', 'materia'], 'integer'],
            [['alumo'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['alumo' => 'id']],
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
            'alumo' => 'Alumo',
            'materia' => 'Materia',
        ];
    }

    /**
     * Gets query for [[Alumo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumo0()
    {
        return $this->hasOne(Alumno::class, ['id' => 'alumo']);
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
