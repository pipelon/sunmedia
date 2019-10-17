<?php

namespace app\controllers;

use Yii;
use app\models\Anuncios;
use app\models\AnunciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnunciosController implements the CRUD actions for Anuncios model.
 */
class AnunciosController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionGetanuncios(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $anuncios = Anuncios::find()
                ->asArray()
                ->joinwith('componentes')
                ->all();
        return array('status' => true, 'code' => 200, 'data'=> $anuncios);
    }

    /**
     * Lists all Anuncios models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AnunciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anuncios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $query = \app\models\Componentes::find()->where(['anuncio_id' => $id]);

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $query            
        ]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'modelC' => $provider,
        ]);
    }

    /**
     * Creates a new Anuncios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Anuncios();

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha = date('Y-m-d H:i:s');
            $model->estado = 'published';
            $model->publicado = 2;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Anuncios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Anuncios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anuncios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anuncios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Anuncios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
