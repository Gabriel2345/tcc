<?php

namespace app\models;

use Yii;

/**
 * Esse é o modelo para a tabela consulta.
 *
 * @property int $id Código
 * @property int $id_funcionario Funcionário
 * @property int $id_paciente Paciente
 *
 * @property Atestado[] $atestados
 * @property Funcionario $funcionario
 * @property Paciente $paciente
 * @property Receita[] $receitas
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'id_paciente'], 'required'],
            [['id_funcionario', 'id_paciente'], 'integer'],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_funcionario' => 'Funcionário',
            'id_paciente' => 'Paciente',
        ];
    }

    /**
     * Gets query for [[Atestados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtestados()
    {
        return $this->hasMany(Atestado::className(), ['id_consulta' => 'id']);
    }

    /**
     * Gets query for [[Funcionario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id' => 'id_funcionario']);
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
     * Gets query for [[Receitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['id_consulta' => 'id']);
    }
}
