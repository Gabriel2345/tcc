<?php

namespace app\controllers;

use Yii;
use app\models\Triagem;
use app\models\Paciente;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
            'query' => Triagem::find(),
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
     * Updates an existing Triagem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_paciente)
    {
        $model = Triagem::find(['id'=>$id,'id_paciente' => $id_paciente ])->one();
        //$model = $this->findModel($id);
       
        if ($model->load(Yii::$app->request->post())) {
            $model->classificarRisco();
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Triagem alterada com sucesso');
//                return $this->redirect(['index', 'id_paciente' => $id_paciente]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            
            
        ]);
    }

    /**
     * Deletes an existing Triagem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id_paciente)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Triagem excluída com sucesso');
        return $this->redirect(['index', 'id_paciente' => $id_paciente]);
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
