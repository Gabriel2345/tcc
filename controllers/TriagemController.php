<?php

namespace app\controllers;

use Yii;
use app\models\Triagem;
use app\models\Paciente;
use app\models\FilaEspera;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\IntegrityException;
use yii\filters\AccessControl;

/**
 * TriagemController implementa as ações de CRUD do modelo triagem.
 */
class TriagemController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
         
                ],
            ],
        ];
    }
    
    /**
     * Lista todos os modelos Triagem.
     * @return mixed
     */
    public function actionIndex($id_paciente)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Triagem::find()->where(['id_paciente' => $id_paciente]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,           
        ]);
    }

   
    /**
     * Cria um novo modelo triagem.
     * Se criar com sucesso, direciona para a página index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate($id_paciente)
    {
        $model = new Triagem();
        $model->id_paciente = $id_paciente;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Triagem criada com sucesso');
            return $this->redirect(['index', 'id_paciente' => $id_paciente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Altera um modelo triagem existente.
     * Se atualizar com sucesso retorna mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $model = Triagem::find()->where(['id' => $request->get('id'), 'id_paciente' => $request->get('id_paciente') ])->one();
        //$model = $this->findModel($id);
       
        if ($model->load(Yii::$app->request->post())) {
            $model->classificarRisco();
            if($model->save()){
                $fila = FilaEspera::find()->where(['id' => $request->get('id_fila')])->one();
                $fila->id_status = 2;
                $fila->save();
                Yii::$app->session->setFlash('success', 'Triagem alterada com sucesso');
                //return $this->redirect(['index', 'id_paciente' => $id_paciente]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            
            
        ]);
    }

    /**
     * Deleta um modelo triagem existente.
     * Se deletar com sucesso, retorna para a página index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_paciente)
    {
        $fila = Yii::$app->request->get('id_fila');
        $model = $this->findModel($id, $id_paciente);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Triagem excluída com sucesso');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir esta triagem. Paciente ainda em atendimento');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }
        
    }

    /**
     * Busca um modelo triagem com base na chave primária.
     * Se o modelo não for encontrado, exibe uma mensagem de erro 404 HTTP.
     * @param integer $id
     * @return Triagem o modelo carregado
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Triagem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
