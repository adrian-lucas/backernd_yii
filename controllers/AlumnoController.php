<?php

namespace app\controllers;
use Yii;
use app\models\Alumno;

use yii\db\Exception;
use yii\base\ErrorException;
use yii\base\UserException;





class AlumnoController extends \yii\web\Controller
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
                      'changeemail'=>['put'],
                      'materias'=>['get'],
                      'notas'=>['get'],
                      'notasaceptables'=>['get'],
                      
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
        $alumnos=Alumno::find()->all();
        return $alumnos;
    }

    public function actionRegister()
    {
        $body = Yii::$app->getRequest()->getBodyParams();
        $model = new Alumno();
        $model->load($body,'');
        if(!$model->save()){
            return $model->errors;
        }
        return $model;
    }

    public function actionViewonestudent()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumno::findOne($id);
        return $alumno;
    }

    public function actionRemove()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumno::findOne($id);
        try{
        $alumno->delete();
        }catch(Exception $e){
            return $e;
        }
        return $alumno;
        
    }

    public function actionChangename()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $body = Yii::$app->getRequest()->getBodyParams();
        $alumno = Alumno::findOne($id);
        if(!$alumno->load($body,''))
        {
            return $alumno->errors;
        }
        

        if(!$alumno->save())
        {
            return $alumno->errors;
        }
        
        return $alumno;
    }

    public function actionChangeemail()
    {
        $nombre = Yii::$app->getRequest()->getBodyParam('nombre');
        $nuevoEmail = Yii::$app->getRequest()->getBodyParam('email');
        $alumno = Alumno::find(['nombres' => $nombre])->one();
        $alumno->email=$nuevoEmail;
        if(!$alumno->save())
        {
            return$alumno->errors;
        }
        
        
        return $alumno;
    }
    
    public function actionMaterias()
    {
        $codigo_sis = Yii::$app->getRequest()->getBodyParam('codigo_sis');
        $alumno = Alumno::find()
                         ->select(['alumno.nombres','materia.nombre'])
                         ->leftJoin('alumno_materia','alumno_materia.alumno=alumno.id')
                         ->leftJoin('materia','alumno_materia.materia=materia.id')
                         ->where(['alumno.codigo_sis'=>$codigo_sis,])
                         ->asArray()
                         ->all();
        return $alumno;
    }

    public function actionMateriasAprobadas()
    {
        $codigo_sis = Yii::$app->getRequest()->getBodyParam('codigo_sis');
        $alumno = Alumno::find()
                          ->select(['alumno.nombres','materia.nombre','nota.puntaje','nota.gestion'])
                          ->leftJoin('nota','nota.alumno = alumno.id')
                          ->leftJoin('materia','nota.materia = materia.id')
                          ->where(['>','nota.puntaje',50])
                          ->andWhere(['alumno.codigo_sis'=>$codigo_sis])
                          ->asArray()
                          ->all();        
        return $alumno;
    }

    public function actionNotas()
    {
        $codigo_sis= Yii::$app->getRequest()->getBodyParam('codigo_sis');
      
            $alumno = Alumno::find()
                            ->select(['nota.gestion','materia.nombre','nota.puntaje','alumno.nombres'])
                            ->leftJoin('nota','nota.alumno=alumno.id')
                            ->leftJoin('materia','nota.materia = materia.id')
                            ->where(['alumno.codigo_sis'=>$codigo_sis])
                            ->asArray()
                            ->all();
        return $alumno;
    }
    
    public function actionWith()
    {
        return Alumno::find()
                      ->with('alumnoMaterias')
                      ->all();
    }
    
}
