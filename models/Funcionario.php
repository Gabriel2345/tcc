<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * Modelo para a tabela Funcionário.
 *
 * @property int $id Código
 * @property string $nome Nome
 * @property string $telefone Telefone
 * @property string $endereco Endereço
 * @property int $id_cargo Cargo
 * @property string $usuario Usuário
 * @property string $senha Senha
 *
 * @property Consulta[] $consultas
 * @property Cargo $cargo
 * @property Triagem[] $triagems
 */
class Funcionario extends \yii\db\ActiveRecord implements IdentityInterface
{

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    public $hash;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'telefone', 'endereco', 'id_cargo', 'senha', 'usuario'], 'required', 'on' => self::SCENARIO_CREATE],
            [['nome', 'telefone', 'endereco', 'id_cargo', 'usuario'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['id_cargo'], 'integer'],
            [['nome', 'endereco'], 'string', 'max' => 150],
            [['telefone'], 'string', 'max' => 15],
            [['usuario', 'senha'], 'string', 'max' => 50],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id']],
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
            'telefone' => 'Telefone',
            'endereco' => 'Endereço',
            'id_cargo' => 'Cargo',
            'usuario' => 'Usuário',
            'senha' => 'Senha'
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'id_cargo']);
    }

    /**
     * Gets query for [[Triagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriagems()
    {
        return $this->hasMany(Triagem::className(), ['id_funcionario' => 'id']);
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null) {
        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return false;
    }

    public function validateAuthKey($authKey) {
        return false;
    }

    public static function findByUsername($nome_usuario) {
        return static::findOne(['usuario' => $nome_usuario]);
    }

    public function validatePassword($senha_form) {
        return $this->hash === sha1($senha_form);
    }

    public function scenarios() {
        return [
            self::SCENARIO_CREATE => ['nome', 'telefone', 'endereco', 'id_cargo', 'usuario', 'senha'],
            self::SCENARIO_UPDATE => ['nome', 'telefone', 'endereco', 'id_cargo', 'usuario', 'senha'],
        ];
    }

    public function afterFind() {
        $this->hash = $this->senha;
        $this->senha = '';
        parent::afterFind();
    }

    public function beforeSave($insert) {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        if($insert) {
            $this->senha = sha1($this->senha);
        }else {
            if($this->senha != '') {
                $this->senha = sha1($this->senha);
            }else {                
                $this->senha = $this->hash;
            }
        }

        return true;
    }
}
