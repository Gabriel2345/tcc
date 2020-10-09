<?php

namespace app\controllers;

use Yii;
use app\models\Consulta;
use app\models\Paciente;
use app\models\Triagem;
use app\models\FilaEspera;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\IntegrityException;
use yii\filters\AccessControl;

/**
 * ConsultaController implementa ações de CRUD do modelo Consulta.
 */
class ConsultaController extends Controller
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
     * Lista os modelos Consulta.
     * @return mixed
     */
    public function actionIndex($id_paciente)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Consulta::find()->where(['id_paciente' => $id_paciente]),
        ]);

        $triagem = Triagem::find()->where(['id_paciente' => $id_paciente])->joinWith('paciente')->orderBy('id DESC')->limit(1)->one();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'triagem' => $triagem

        ]);
    }

    /**
     * Cria um modelo Consulta.
     * Se criar com sucesso, direciona para a view index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate($id_paciente)
    {
        $request = Yii::$app->request;
        $model = new Consulta();
        $model->id_paciente = $id_paciente;
        $fila = Yii::$app->request->get('id_fila');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $fila = FilaEspera::find()->where(['id' => $request->get('id_fila')])->one();
            $fila->id_status = 3;
            $fila->save();                 
            Yii::$app->session->setFlash('success', 'Consulta registrada com sucesso');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }

        return $this->render('create', [
            'model' => $model,
            
        ]);
    }

    /**
     * Edita um modelo consulta existente.
     * Se editar com sucesso, direciona para a view index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException Se o modelo não for encontrado
     */
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $model = Consulta::find()->where(['id'=> $request->get('id'), 'id_paciente' => $request->get('id_paciente')])->one();
        $fila = Yii::$app->request->get('id_fila');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $fila = FilaEspera::find()->where(['id' => $request->get('id_fila')])->one();
            $fila->id_status = 3;
            $fila->save();
            Yii::$app->session->setFlash('success', 'Consulta editada com sucesso');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }

        return $this->render('update', [
            'model' => $model,
            'fila' => 'id_fila'
        ]);
    }

    /**
     * Exclui um modelo consulta existente.
     * Se excluir com sucesso, direciona para a view index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se modelo não for encontrado
     */
    public function actionDelete($id, $id_paciente)
    {
        $fila = Yii::$app->request->get('id_fila');
        $model = $this->findModel($id, $id_paciente);

        try{
            $model->delete();
            Yii::$app->session->setFlash('success', 'Consulta removida com sucesso');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }catch(IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir esta consulta. Verifique se há atestados ou receitas vinculados antes de excluir');
            return $this->redirect(['index', 'id_paciente' => $id_paciente, 'id_fila' => $fila]);
        }

        
    }

    /**
     * Busca um modelo Consulta com base na chave primária.
     * Se modelo não for encontrado, exibe mensagem  de erro 404 HTTP.
     * @param integer $id
     * @return Consulta o modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
