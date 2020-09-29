<?php

namespace app\controllers;

use Yii;
use app\models\Paciente;
use app\models\FilaEspera;
use app\models\Triagem;
use app\models\Prioridade;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PacienteController implementa ações de CRUD do modelo paciente.
 */
class PacienteController extends Controller
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
     * Lists todos os modelos paciente.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Paciente::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

   
    /**
     * Cria um novo modelo paciente.
     * Se criar com sucesso, redireciona para a página index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Paciente cadastrado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo paciente existente.
     * Se editar com sucesso, redireciona para a página index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Paciente atualizado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo paciente existente.
     * Se excluir com sucesso, redireciona para a página index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Cadastro excluído com sucesso');
        return $this->redirect(['index']);
    }

    /**
     * Busca um modelo paciente baseado na chave primária.
     * Se o modelo não for encontrado, exibe uma mensagem de erro 404 HTTP.
     * @param integer $id
     * @return Paciente the loaded model
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }

    public function actionAdicionarFila($id_paciente)
    {
        
        
        $triagem = new Triagem();
        $triagem->id_paciente = $id_paciente;
        $triagem->temp = 0;
        $triagem->pas = 0;
        $triagem->pad = 0;
        $triagem->sat = 0;
        $triagem->obs = 'teste';
        $triagem->id_funcionario = Yii::$app->user->id;
        $triagem->id_prioridade = 1;
        $triagem->save();
        $fila = new FilaEspera();
        $fila->id_status = 1;        
        $fila->hora_chegada = date('H:i:s');
        $fila->data = date('Y-m-d');
        $fila->id_paciente = $id_paciente;
        $fila->id_triagem = $triagem->getPrimaryKey();       
        $fila->save();
        //$triagem->validate();
        //die(var_dump($triagem->errors));
        $this->redirect(['/fila-espera/index']);

    }


    
}
