<?php

namespace app\controllers;

use Yii;
use app\models\Userlogin;
use app\models\UserloginSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserloginController implements the CRUD actions for Userlogin model.
 */
class UserloginController extends Controller
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
     * Lists all Userlogin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserloginSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userlogin model.
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
     * Creates a new Userlogin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userlogin();
        
        if ($model->load(Yii::$app->request->post())) {
            //cek apabila ada username yg telah terdaftar
            if(Userlogin::find()->where(['username'=> $model->username])->exists())
            {
                Yii::$app->session->setFlash('error', 'Username ini telah terdaftar untuk login, silahkan cek kembali!');             
                return $this->goBack(Yii::$app->request->referrer);
            } 

            if($model->save()){
                Yii::$app->session->setFlash('success', 'Username '.$model->username.' berhasil diresgistrasi untuk login! Kami menyarankan untuk mencoba login username tersebut!');
                return $this->redirect(['view', 'id' => $model->username]);
            }
                    
           // return $this->redirect(['view', 'id' => $model->username]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userlogin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->username]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userlogin model.
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
     * Finds the Userlogin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Userlogin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userlogin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
