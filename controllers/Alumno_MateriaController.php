<?php

namespace app\controllers;
use Yii;
use app\models\Alumno_Materia;

class Alumno_MateriaController extends \yii\web\Controller
{
    public function behaviors()
    {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
        'class' => \yii\filters\VerbFilter::class,
        'actions' => ['register'=>['post'],
                       'viewall'=>['get'],  
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
    public function actionViewall()
    {
        return Alumno_Materia::find()->all();
    }

    public function actionRegister()
    {
        $alumnoMateria = new Alumno_Materia();
        $body = Yii::$app->request;
        $alumnoMateria->alumno = $body->getBodyParam('alumno');
        $alumnoMateria->materia = $body->getBodyPararam('materia'); 
        $alumnoMateria->save();
        return $alumnoMateria;
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
