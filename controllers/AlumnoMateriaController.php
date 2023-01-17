<?php

namespace app\controllers;
use Yii;
use app\models\AlumnoMateria;

class AlumnoMateriaController extends \yii\web\Controller
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
    public function actionViewAll()
    {
        return AlumnoMateria::find()->all();
    }

    public function actionRegister()
    {
        $alumnoMateria = new AlumnoMateria();
        $body = Yii::$app->request;
        $alumnoMateria->alumno = $body->getBodyParam('alumno');
        $alumnoMateria->materia = $body->getBodyParam('materia'); 
        $alumnoMateria->save();
        return $alumnoMateria;
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    

}
