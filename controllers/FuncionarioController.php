<?php

namespace app\controllers;

use Yii;
use app\models\Funcionario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\IntegrityException;
use yii\filters\AccessControl;


/**
 * FuncionarioController implementa as ações de CRUD do modelo Funcionario.
 */
class FuncionarioController extends Controller
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
     * Lista todos os modelos da tabela Funcionario.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Funcionario::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo FUncionario.
     * Se criar com sucesso, direciona para a view index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Funcionario();
        $model->scenario = Funcionario::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Funcionário incluído com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Altera um modelo Funcionario existente.
     * Se alterar com sucesso, direciona para a view index com mensagem de sucesso.
     * @param integer $id
     * @param integer $id_cargo
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id, $id_cargo)
    {
        $model = $this->findModel($id, $id_cargo);
        $model->scenario = Funcionario::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Funcionário alterado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo Funcionario existente.
     * Se excluir com sucesso direciona para a view index com mensagem de sucesso.
     * @param integer $id
     * @param integer $id_cargo
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_cargo)
    {
        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Funcionário removido com sucesso.');
            return $this->redirect(['/caracteristica/index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFLash('warning', 'Não foi possível excluir esse funcionário. Verifique se há cargo vinculado antes de excluir');
            return $this->redirect(['index']);
        }
    }

    /**
     * Busca um modelo Funcionario com base na chave primária.
     * se não encontrar o modelo, exibe erro 404 HTTP.
     * @param integer $id
     * @param integer $id_cargo
     * @return Funcionario modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Funcionario::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe');
    }
}
