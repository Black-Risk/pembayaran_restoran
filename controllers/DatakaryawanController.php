<?php

namespace app\controllers;

use Yii;
use app\models\Datakaryawan;
use app\models\DatakaryawanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\filters\AccessControl;

/**
 * DatakaryawanController implements the CRUD actions for Datakaryawan model.
 */
class DatakaryawanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
                'access'=> [
                    'class'=>AccessControl::className(),
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
     * Lists all Datakaryawan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatakaryawanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datakaryawan model.
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
     * Creates a new Datakaryawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datakaryawan();

        if ($model->load(Yii::$app->request->post())) {
            //cek apabila ada username yg telah terdaftar
            if(Datakaryawan::find()->where(['username'=> $model->username])->exists())
            {
                Yii::$app->session->setFlash('error', 'Username ini telah dipakai oleh karyawan lain, silahkan mengganti username lainnya!');             
                return $this->goBack(Yii::$app->request->referrer);
            }  

            //simpan nama foto ke DB
            $model->fotoKaryawan = UploadedFile::getInstance($model, 'fotoKaryawan');
            $model->save();

            //simpan file foto ke storage website
            $file = UploadedFile::getInstances($model, 'fotoKaryawan');
                foreach ($file as $file) {
                    $path =Yii::getAlias('@uploadimage').'/gambar/datakaryawan/'.$file->name;
                    $file->saveAs($path);
                }
            
            return $this->redirect(['view', 'id' => $model->username]);
        }

       return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Datakaryawan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['fotoKaryawan'])) {
            $model->fotoKaryawan = $_POST['fotoKaryawan'];

            $uploadedFile = CUploadedFile::getInstance($model,'image');
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->fotoKaryawan = UploadedFile::getInstance($model, 'fotoKaryawan');
            $model->save();
            $file = UploadedFile::getInstances($model, 'fotoKaryawan');
                foreach ($file as $file) {
                    $path =Yii::getAlias('@uploadimage').'/gambar/datakaryawan/'.$file->name;
                    $file->saveAs($path);
                }

            return $this->redirect(['view', 'id' => $model->username]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Datakaryawan model.
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
     * Finds the Datakaryawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Datakaryawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datakaryawan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
