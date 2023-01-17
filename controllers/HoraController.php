<?php

namespace app\controllers;
use Yii;
use app\models\Hora;

class HoraController extends \yii\web\Controller
{
    
    public function behaviors()
    {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
        'class' => \yii\filters\VerbFilter::class,
        'actions' => [
                       'viewAll'=>['get'],  
                       'register'=>['post']
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
        return Hora::find()->all();
    }
    public function actionRegister(){
        $hora = new Hora();
        $body = Yii::$app->request;
        $hora->dia = $body->getBodyParam('dia');
        $hora->hora_inicio = $body->getBodyParam('hora_inicio');
        $hora->hora_fin = $body->getBodyParam('hora_fin');
        $hora->aula = $body->getBodyParam('aula');
        $hora->materia = $body->getBodyParam('materia');
        $hora->save();
        return $hora;
    }
    


    public function actionIndex()
    {
        return $this->render('index');
    }

}
