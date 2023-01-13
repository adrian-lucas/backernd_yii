<?php

namespace app\controllers;
use Yii;
use app\models\Alumnos;

class AlumnosController extends \yii\web\Controller
{
    public function behaviors()
    {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
        'class' => \yii\filters\VerbFilter::class,
        'actions' => ['index' => ['get'],
                     'register' => ['post'],
                     //'remove' => ['remove'],
                     'viewonestudent' =>['get']
                     ]
     ];
     return $behaviors;
    }
    public function beforeAction($action)
    {
        Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;
        $this->enableCsrfValidation=false;
        return parent::beforeAction($action);
    }
    public function actionViewallstudents()
    {
        $alumnos=Alumnos::find()->all();
        return $alumnos;
    }
    public function actionRegister()
    {
        $body = Yii::$app->getRequest()->getBodyParams();
        $model = new Alumnos();
        $model->load($body,'');
        if(!$model->save()){
            return $model->errors;
        }
        return $model;

    }
    public function actionViewonestudent()
    {
        $id = 3;
        $alumno = Alumnos::findOne($id);
        return $alumno;
    }
    public function actionRemove()
    {
        $id = 3;
        $alumno = Alumnos::findOne($id);
        $alumno->delete();
        
        
        
    }
    public function actionChange(){

    }

    public function actionIndex()
    {
        $alumnos=Alumnos::find()->all();
        return $alumnos;
    }

}
