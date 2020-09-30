<?php

namespace app\models;

use Yii;

/**
 * Modelo para a tabela Triagem.
 *
 * @property int $id Código
 * @property float $temp Temperatura
 * @property int $sat Saturação
 * @property int $pad Pressão arterial diastólica
 * @property int $pas Pressão arterial sistólica
 * @property string|null $obs Observação
 * @property int $id_funcionario Funcionário
 * @property int $id_paciente Paciente
 * @property int $id_prioridade Prioridade
 *
 * @property FilaEspera[] $filaEsperas
 * @property Funcionario $funcionario
 * @property Paciente $paciente
 * @property Prioridade $prioridade
 */
class Triagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'triagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['temp', 'sat', 'pad', 'pas', 'id_funcionario', 'id_paciente', 'id_prioridade'], 'required'],
            [['temp'], 'number'],
            [['sat', 'pad', 'pas', 'id_funcionario', 'id_paciente', 'id_prioridade'], 'integer'],
            [['obs'], 'string'],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
            [['id_prioridade'], 'exist', 'skipOnError' => true, 'targetClass' => Prioridade::className(), 'targetAttribute' => ['id_prioridade' => 'id']],
        ];
    }

    /**
     * {@inheritdoc }
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'temp' => 'Temperatura',
            'sat' => 'Saturação',
            'pad' => 'Pressão arterial diastólica',
            'pas' => 'Pressão arterial sistólica',
            'obs' => 'Observação',
            'id_funcionario' => 'Funcionário',
            'id_paciente' => 'Paciente',
            'id_prioridade' => 'Prioridade',
        ];
    }

    /**
     * Gets query for [[FilaEsperas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilaEsperas()
    {
        return $this->hasMany(FilaEspera::className(), ['id_triagem' => 'id']);
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
     * Gets query for [[Prioridade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrioridade()
    {
        return $this->hasOne(Prioridade::className(), ['id' => 'id_prioridade']);
    }

    public function classificarRisco() {
            
           

        //if($this->temp == 0 || $this->pad == 00 || $this->pas == 0 || $this->sat == 0) {
          //  echo 'execulta funcao';die();            
        //}
        // se temperatura estiver normal 
        if($this->temp >= 36 && $this->temp <= 37.5){            
            // se pressão estiver normal
            if($this->pas <= 120 && $this->pad <= 80 ){
                // se saturação estiver normal cor azul
                if($this->sat == 100){
                    $this->id_prioridade = 1;
                    
                } //se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                }//caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            } // pressão um pouco alterada
            else if(($this->pad >= 80 && $this->pad <= 89) && ($this->pas >= 120 && $this->pas <= 139 )){
                // se saturação estiver normal cor verde
                if($this->sat == 100){
                    $this->id_prioridade = 2;
                }//se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            } //pressão igual ou acima de 140/90
            else if(($this->pad >= 90 && $this->pad <= 109) && ($this->pas >= 140 && $this->pas <= 159)) {
                // saturação normal cor amarela
                if($this->sat == 100) {
                    $this->id_prioridade = 3;
                } // saturação um pouco baixa cor amarela 
                else if($this->sat <=99 && $this->sat >= 95){
                    $this->id_prioridade = 3;
                } // saturação abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }
            }// pressão igual ou maior que 160/100
            else if($this->pad >= 100 && $this->pas >= 160) {
                // saturação abaixo de 90 caso de emergência               
                if($this->sat >= 90) {
                    // cor laranja
                    $this->id_prioridade = 4;
                }else{
                    $this->id_prioridade = 5;
                }               
            }
        }// temperatura pouco acima de 37.5
        else if($this->temp >= 37.5 && $this->temp <= 37.9) {
            // pressão normal
            if($this->pas <= 120 && $this->pad <= 80){
                // se saturação estiver normal cor verde
                if($this->sat == 100){
                    $this->id_prioridade = 2;
                    
                } //se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                }//caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            }// pressão um pouco alterada
            else if(($this->pas >= 120 && $this->pas <= 139 ) && ($this->pad >= 80 && $this->pad <= 89)){
                // se saturação estiver normal cor verde
                if($this->sat == 100){
                    $this->id_prioridade = 2;
                }//se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            }// pressão um pouco alta
            else if(($this->pas >= 140 && $this->pas <= 159) && ($this->pad >= 90 && $this->pad <= 109)) {
                // saturação normal cor amarela
                if($this->sat == 100) {
                    $this->id_prioridade = 3;
                } // saturação um pouco baixa cor amarela 
                else if($this->sat <=99 && $this->sat >= 95){
                    $this->id_prioridade = 3;
                } // saturação abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }
            }// pressão igual ou maior a 160/100
            else if($this->pas >= 160 && $this->pad >= 100) {
                // saturação abaixo de 90 caso de emergência               
                if($this->sat <= 90) {
                    $this->prioridade = 5;
                }else{
                    // cor laranja
                    $this->prioridade = 4;
                }
                
            }      
        }// temperatura acima de 38
        else if($this->temp >= 38 && $this->temp <= 39.9) {
            // pressão normal
            if($this->pas <= 120 && $this->pad <= 80){
                // se saturação estiver normal cor amarela
                if($this->sat == 100){
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                }//caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            }// pressão um pouco alterada
            else if(($this->pas >= 120 && $this->pas <= 139 ) && ($this->pad >= 80 && $this->pad <= 89)){
                // se saturação estiver normal cor amarela
                if($this->sat == 100){
                    $this->id_prioridade = 3;
                }//se saturação estiver um pouco baixa cor amarela
                else if($this->sat <= 99 && $this->sat >= 95) {
                    $this->id_prioridade = 3;
                    
                } //se saturação estiver abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                    
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }                
            }// pressão um pouco alta
            else if(($this->pas >= 140 && $this->pas <= 159) && ($this->pad >= 90 && $this->pad <= 109)) {
                // saturação normal cor amarela
                if($this->sat == 100) {
                    $this->id_prioridade = 3;
                } // saturação um pouco baixa cor amarela 
                else if($this->sat <=99 && $this->sat >= 95){
                    $this->id_prioridade = 3;
                } // saturação abaixo de 95 cor laranja
                else if($this->sat >= 90 && $this->sat <= 94) {
                    $this->id_prioridade = 4;
                } //caso de emergência cor vermelha
                else {
                    $this->id_prioridade = 5;
                }
            }// pressão igual ou maior a 160/100
            else if($this->pas >= 160 && $this->pad >= 100) {
                // saturação abaixo de 90 caso de emergência               
                if($this->sat <= 90) {
                    $this->id_prioridade = 5;
                }else {
                    // cor laranja
                    $this->id_prioridade = 4;
                }
                
            }      
        }// temperatura acima ou igual a 40
        else  {            
            // pressão igual ou maior a 160/100
            if($this->pas >= 160 && $this->pad >= 100) {                               
                if($this->sat >= 90) {
                     // cor laranja
                    $this->id_prioridade = 4;
                }else {
                    // saturação abaixo de 90 caso de emergência
                    $this->id_prioridade = 5;
                }                
            }           
        }
    }

    public function beforeSave($insert) {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        if($insert) {
            $this->classificarRisco();
            
        }
        

        return true;
    }

}
