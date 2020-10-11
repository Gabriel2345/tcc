<?php 

namespace app\models;

use Yii;
use yii\base\Model;

class FiltroConsultaForm extends Model {
    public $data;

    public function rules() {
        return [
            ['data', 'required'],
            ['data', 'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'data' => 'Data'
        ];
    }
}