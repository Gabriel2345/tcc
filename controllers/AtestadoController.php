<?php

namespace app\controllers;

use Yii;
use app\models\Atestado;
use app\models\Consulta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AtestadoController implements the CRUD actions for Atestado model.
 */
class AtestadoController extends Controller
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
     * Lista todos os modelos Atestado.
     * @return mixed
     */
    public function actionIndex($id_consulta)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Atestado::find()->where(['id_consulta' => $id_consulta]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,            
        ]);
    }

    

    /**
     * Cria um novo modelo Atestado.
     * Se criar com sucesso, redireciona para a view index com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate($id_consulta)
    {
        $model = new Atestado();
        $model->id_consulta = $id_consulta;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Atestado criado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Altera um modelo atestado existente.
     * Se alterar com sucesso, redireciona para a view index com mensagem de sucesso.
     * @param integer $id
     * @param integer $id_consulta
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id, $id_consulta)
    {
        $model = $this->findModel($id, $id_consulta);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Atestado alterado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo atestado existente.
     * Se excluir com sucesso, redireciona para a view index com mensagem de sucesso.
     * @param integer $Id
     * @param integer $Consulta_Id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_consulta)
    {
        $this->findModel($id, $id_consulta)->delete();
        Yii::$app->session->setFlash('success', 'Atestado excluído com sucesso');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Atestado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $Consulta_Id
     * @return Atestado the loaded model
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id, $id_consulta)
    {
        if (($model = Atestado::findOne(['id' => $id, 'id_consulta' => $id_consulta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }

    public function actionAtestado($id, $id_consulta) {

        $model = $this->findModel($id, $id_consulta);

        
        
    }
}
