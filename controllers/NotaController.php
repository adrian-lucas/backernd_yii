<?php

namespace app\controllers;
use Yii;
use app\models\Nota;

class NotaController extends \yii\web\Controller
{
    public function behaviors()
    {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
        'class' => \yii\filters\VerbFilter::class,
        'actions' => [
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
        return Nota::find()->all();

    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
