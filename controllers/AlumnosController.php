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
        'actions' => ['viewallstudents' => ['get'],
                     'register' => ['post'],
                      'remove' => ['delete'],
                      'viewonestudent' =>['get'],
                      'changename' =>['put'],
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
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumnos::findOne($id);
        return $alumno;
    }
    public function actionRemove()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumnos::findOne($id);
        $alumno->delete();
        return $alumno;
        
    }
    public function actionChangename(){

        $id = Yii::$app->getRequest()->getBodyParam('id');
        $nuevoNombre = Yii::$app->getRequest()->getBodyParam('nombre');
        $alumno = Alumnos::findOne($id);
        $alumno->nombre = $nuevoNombre;
        $alumno->save();
        return $alumno;
    }

}