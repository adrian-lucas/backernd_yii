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
        $materia = Materia::find()
                            ->select(['materia.nombre','alumno.nombres'])
                            ->leftJoin('alumno_materia','alumno_materia.materia = materia.id')
                            ->leftJoin('alumno','alumno_materia.alumno = alumno.id')
                            ->where(['materia.id'=>$idMateria])
                            ->asArray()
                            ->all();
        return $materia; 
    }
    public function actionHorarios()
    {
        $idMateria = Yii::$app->getRequest()->getBodyParams('id');
        $materia = Materia::find()
                            ->select(['materia.nombre as materia','hora.dia','aula.nombre as aula','hora.hora_inicio','hora.hora_fin'])
                            ->leftJoin('hora','hora.materia = materia.id')
                            ->leftJoin('aula','hora.aula = aula.id')
                            ->where(['materia.id'=>$idMateria])
                            ->asArray()
                            ->all();

        return $materia;
    }
    public function actionNotas()
    {
        $idMateria =Yii::$app->getRequest()->getBodyParam('id');
        $materia = Materia::find()
                            ->select(['materia.nombre materia','alumno.nombres as alumno','nota.puntaje as nota','nota.gestion'])
                            ->leftJoin('nota','nota.materia = materia.id')
                            ->leftJoin('alumno','nota.alumno = alumno.id')
                            ->where(['materia.id'=>$idMateria])
                            ->asArray()
                            ->all();
        return $materia;
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
