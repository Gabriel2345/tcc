<?php

namespace app\models;

use Yii;

/**
 * Esse é o modelo para a tabela Status.
 *
 * @property int $id Código
 * @property string $descricao Descrição
 *
 * @property FilaEspera[] $filaEsperas
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['id'], 'integer'],
            [['descricao'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * Gets query for [[FilaEsperas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilaEsperas()
    {
        return $this->hasMany(FilaEspera::className(), ['id_status' => 'id']);
    }
}
