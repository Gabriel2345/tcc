<?php

namespace app\controllers;

use Yii;
use app\models\FilaEspera;
use app\models\Paciente;
use app\models\Triagem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FilaEsperaController implementa ações de CRUD do modelo Fila de espera.
 */
class FilaEsperaController extends Controller
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
     * Lista os modelos Fila de espera.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FilaEspera::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo Fila de espera.
     * Se criar com sucesso, encaminha para a página index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilaEspera();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo Fila existente.
     * Se editar com sucesso, encaminha para a página index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se modelo não for encontrado
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deleta um modelo Fila existente.
     * Se deletar com sucesso, encaminha para a página index com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca um modelo Fila baseado .
     * Se o modelo não for encontrado, exibe uma mensagem 404 HTTP.
     * @param integer $id
     * @return FilaEspera o modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = FilaEspera::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
