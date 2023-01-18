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
                       'alumnos'=>['get'],
                       'horarios'=>['get'],
                       'notas'=>['get'],
                       'aprobados'=>['get'],
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
    public function actionAlumnosInscritos(){
        $idMateria = Yii::$app->getRequest()->getBodyParam('id');
        $materia = Materia::findOne($idMateria);
        return $materia->alumnoMaterias; 
    }
    public function actionHorarios()
    {
        $idMateria = Yii::$app->getRequest()->getBodyParams('id');
        $materia = Materia::findOne($idMateria);
        return $materia->horas;
    }
    public function actionNotas()
    {
        $idMateria =Yii::$app->getRequest()->getBodyParam('id');
        $materia = Materia::findOne($idMateria);
        return $materia->notas;
    }
    public function actionAprobados()
    {
        $notaMinima=50;
        $idMateria = Yii::$app->getRequest()->getBodyParam('id');
        $materia = Materia::findOne($idMateria);
        $aprobados = $materia->getNotas()
                    ->select(['gestion','alumno','puntaje'])
                    ->where(['>','puntaje',$notaMinima])
                    ->all();
        
        return $aprobados;

    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
