<?php

namespace app\controllers;
use Yii;
use app\models\Materia;

class MateriaController extends \yii\web\Controller
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
        return Materia::find()->all();

    }
    public function actionRegister()
    {
        $body = Yii::$app->request;
        $materia = new Materia();
        $materia->nombre = $body->getBodyParam('nombre');
        $materia->codigo_sis = $body->getBodyParam('codigo_sis');
        $materia->save();
        return $materia;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}