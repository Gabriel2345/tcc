<?php

namespace app\models;

use Yii;

/**
 * Esse é o modelo para a tabela Atestado.
 *
 * @property int $id Código
 * @property string $cid CID
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
            [['cid', 'descricao', 'id_consulta'], 'required'],
            [['descricao'], 'string'],
            [['id_consulta'], 'integer'],
            [['cid'], 'string', 'max' => 45],
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
            'cid' => 'CID',
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
