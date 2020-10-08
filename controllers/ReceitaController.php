<?php

namespace app\controllers;

use Yii;
use app\models\Receita;
use app\models\Consulta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

/**
 * ReceitaController implements the CRUD actions for Receita model.
 */
class ReceitaController extends Controller
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
     * Lists all Receita models.
     * @return mixed
     */
    public function actionIndex($id_consulta)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Receita::find()->where(['id_consulta' => $id_consulta]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    
    /**
     * Creates a new Receita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_consulta)
    {
        $model = new Receita();
        $model->id_consulta = $id_consulta;
        $model->data = date('d/m/Y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Receita criada com sucesso');
            return $this->redirect(['index', 'id_consulta' => $id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Receita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id
     * @param integer $Consulta_Id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id, $id_consulta)
    {
        $model = $this->findModel($id, $id_consulta);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Receita alterada com sucesso');
            return $this->redirect(['index', 'id_consulta' => $id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Receita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id
     * @param integer $Consulta_Id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_consulta)
    {
        $this->findModel($id, $id_consulta)->delete();
        Yii::$app->session->setFlash('success', 'Receita excluída com sucesso');
        return $this->redirect(['index', 'id_consulta' => $id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')]);
    }

    /**
     * Finds the Receita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $Consulta_Id
     * @return Receita the loaded model
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id, $id_consulta)
    {
        if (($model = Receita::findOne(['id' => $id, 'id_consulta' => $id_consulta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }

    public function actionReceita($id, $id_consulta) {

        $model = $this->findModel($id, $id_consulta);

        $conteudo = $this->renderPartial('receita', [
            'receita' => $model
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $conteudo
        ]);

        return $pdf->render();

    }
}
