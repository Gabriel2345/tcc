<?php

namespace app\models;

use Yii;

/**
 * Esse é o modelo para a classe Atestado.
 *
 * @property int $id Código
 * @property string $data Data
 * @property string $descricao Descrição
 * @property int $id_consulta Consulta
 *
 * @property Consulta $consulta
 */
class Atestado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atestado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'descricao', 'id_consulta'], 'required'],
            [['data'], 'safe'],
            [['descricao'], 'string'],
            [['id_consulta'], 'integer'],
            [['id_consulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['id_consulta' => 'id']],
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
            'descricao' => 'Descrição',
            'id_consulta' => 'Consulta',
        ];
    }

    /**
     * Gets query for [[Consulta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['id' => 'id_consulta']);
    }
}
