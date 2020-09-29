<?php

namespace app\models;

use Yii;

/**
 * Modelo para a tabela Fila de espera.
 *
 * @property int $id Código
 * @property string $data Data
 * @property string $hora_chegada Hora de chegada
 * @property int $id_status Situação
 * @property int $id_paciente Paciente
 * @property int $id_triagem Triagem
 *
 * @property Paciente $paciente
 * @property Status $status
 * @property Triagem $triagem
 */
class FilaEspera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fila_espera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'hora_chegada', 'id_status', 'id_paciente', 'id_triagem'], 'required'],
            [['data', 'hora_chegada'], 'safe'],
            [['id_status', 'id_paciente', 'id_triagem'], 'integer'],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
            [['id_triagem'], 'exist', 'skipOnError' => true, 'targetClass' => Triagem::className(), 'targetAttribute' => ['id_triagem' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'data' => 'Data',
            'hora_chegada' => 'Hora de chegada',
            'id_status' => 'Situação',
            'id_paciente' => 'Paciente',
            'id_triagem' => 'Triagem',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id' => 'id_paciente']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status']);
    }

    /**
     * Gets query for [[Triagem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriagem()
    {
        return $this->hasOne(Triagem::className(), ['id' => 'id_triagem']);
    }
}
