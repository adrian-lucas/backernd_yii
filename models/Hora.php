<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora".
 *
 * @property int $id
 * @property string $dia
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property int $aula
 * @property int $materia
 *
 * @property Aula $aulas
 * @property Materia $materias
 */
class Hora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dia', 'hora_inicio', 'hora_fin', 'aula', 'materia'], 'required'],
            [['dia'], 'string'],
            [['hora_inicio', 'hora_fin'], 'safe'],
            [['aula', 'materia'], 'default', 'value' => null],
            [['aula', 'materia'], 'integer'],
            [['aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::class, 'targetAttribute' => ['aula' => 'id']],
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
            'dia' => 'Dia',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'aula' => 'Aula',
            'materia' => 'Materia',
        ];
    }

    /**
     * Gets query for [[Aula0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasOne(Aula::class, ['id' => 'aula']);
    }

    /**
     * Gets query for [[Materia0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasOne(Materia::class, ['id' => 'materia']);
    }
}
