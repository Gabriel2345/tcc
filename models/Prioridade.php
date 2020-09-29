<?php

namespace app\models;

use Yii;

/**
 * Modelo para a tabela Prioridade.
 *
 * @property int $id Código
 * @property string $descricao Descrição
 * @property string $cor Cor
 * @property int $previsao_tempo Tempo de espera
 * @property int $prioridade Prioridade
 *
 * @property Triagem[] $triagems
 */
class Prioridade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prioridade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'cor', 'previsao_tempo', 'prioridade'], 'required'],
            [['id', 'previsao_tempo', 'prioridade'], 'integer'],
            [['descricao', 'cor'], 'string', 'max' => 150],
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
            'cor' => 'Cor',
            'previsao_tempo' => 'Tempo de espera',
            'prioridade' => 'Prioridade',
        ];
    }

    /**
     * Gets query for [[Triagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriagems()
    {
        return $this->hasMany(Triagem::className(), ['id_prioridade' => 'id']);
    }
}
