<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id Código
 * @property string $nome Nome
 * @property string $endereco Endereço
 * @property string $telefone Telefone
 * @property string $data_nascimento Data de nascimento
 * @property string $nome_mae Nome da mãe
 *
 * @property Consulta[] $consultas
 * @property FilaEspera[] $filaEsperas
 * @property Triagem[] $triagems
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'endereco', 'telefone', 'data_nascimento', 'nome_mae'], 'required'],
            [['data_nascimento'], 'safe'],
            [['nome', 'endereco'], 'string', 'max' => 150],
            [['telefone'], 'string', 'max' => 15],
            [['nome_mae'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'nome' => 'Nome',
            'endereco' => 'Endereço',
            'telefone' => 'Telefone',
            'data_nascimento' => 'Data de nascimento',
            'nome_mae' => 'Nome da mãe',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['id_paciente' => 'id']);
    }

    /**
     * Gets query for [[FilaEsperas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilaEsperas()
    {
        return $this->hasMany(FilaEspera::className(), ['id_paciente' => 'id']);
    }

    /**
     * Gets query for [[Triagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriagems()
    {
        return $this->hasMany(Triagem::className(), ['id_paciente' => 'id']);
    }
}
