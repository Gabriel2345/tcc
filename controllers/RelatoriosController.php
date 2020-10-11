<?php

namespace app\controllers;

use Yii;
use app\models\FiltroConsultaForm;
use app\models\Consulta;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;


class RelatoriosController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['consultas'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
 
    public function actionConsultas()
    {
        $model = new FiltroConsultaForm;

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            //1 - Procurar consultas que atendam a busca
            $consultas = Consulta::find()
            ->where('data = :data')
            ->params([':data' => $model->data])
            ->all();

            //2 - Gerar PDF e enviar para o usuário
            //a. Criar view para servir de base para o PDF
            $conteudo = $this->renderPartial('consultas-rel', [
                'consultas' => $consultas
            ]);

            return $conteudo;
            //b. Vincular view com PDF e apresentar ao usuário

        }
        return $this->render('consultas', [
            'model' => $model
        ]);
    }

}
