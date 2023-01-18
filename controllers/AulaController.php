<?php

namespace app\controllers;
use Yii;
use app\models\Aula;

class AulaController extends \yii\web\Controller
{
    public function behaviors()
    {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
        'class' => \yii\filters\VerbFilter::class,
        'actions' => [
                       'viewAll'=>['get'],  
                       'register'=>['post'],
                       'hours'=>['get'],
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
        return Aula::find()->all();

    }
    public function actionRegister()
    {
        $aula = new Aula();
        $body = Yii::$app->request;
        $aula->nombre = $body->getBodyParam('nombre');
        $aula->capacidad = $body->getBodyParam('capacidad');
        $aula->;
        return $aula;
    }
    public function actionHours()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $aula = new Aula();
        $aula = Aula::findOne($id);
        return $aula->horas;
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
