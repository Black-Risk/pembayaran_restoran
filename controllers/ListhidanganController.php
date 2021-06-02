<?php

namespace app\controllers;

use Yii;
use app\models\Listhidangan;
use app\models\ListhidanganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\filters\AccessControl;

/**
 * ListhidanganController implements the CRUD actions for Listhidangan model.
 */
class ListhidanganController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
                'access'=> [
                    'class'=>AccessControl::className(),
                    'only' => ['create', 'update', 'delete'],
                    'rules'=>[
                        [
                            'allow'=>true,
                            'roles'=>['@'],
                        ],
                    ],
                ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Listhidangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListhidanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Listhidangan model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Listhidangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idHidangan = 'idHidangan')
    {
        $model = new Listhidangan();

        if ($model->load(Yii::$app->request->post())) {
            $model->fotoHidangan = UploadedFile::getInstance($model, 'fotoHidangan');
            $model->save();
            $file = UploadedFile::getInstances($model, 'fotoHidangan');
                foreach ($file as $file) {
                    $path =Yii::getAlias('@uploadimage').'/gambar/listhidangan/'.$file->name;
                    $file->saveAs($path);
                }
                
            return $this->redirect(['view', 'id' => $model->idHidangan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Listhidangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->fotoHidangan = UploadedFile::getInstance($model, 'fotoHidangan');
            $model->save();
            $file = UploadedFile::getInstances($model, 'fotoHidangan');
                foreach ($file as $file) {
                    $path =Yii::getAlias('@uploadimage').'/gambar/listhidangan/'.$file->name;
                    $file->saveAs($path);
                }
                
            return $this->redirect(['view', 'id' => $model->idHidangan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Listhidangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Listhidangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Listhidangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Listhidangan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
