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
                      'notasnombre'=>['get'],
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
        $alumno->delete();
        return $alumno;
        
    }
    public function actionChangename()
    {

        $id = Yii::$app->getRequest()->getBodyParam('id');
        $nuevoNombre = Yii::$app->getRequest()->getBodyParam('nombre');
        $alumno = Alumno::findOne($id);
        $alumno->nombres= $nuevoNombre;
        $alumno->save();
        return $alumno;
    }
    public function actionChangeemail()
    {
        $nombre = Yii::$app->getRequest()->getBodyParam('nombre');
        $nuevoEmail = Yii::$app->getRequest()->getBodyParam('email');
        $alumno = Alumno::find(['nombres' => $nombre])->one();
        $alumno->email=$nuevoEmail;
        $alumno->save();
        
        return $alumno;
    }
    public function actionMaterias()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumno::findOne($id);
        return $alumno->alumnoMaterias;
    }

    public function actionNotasAceptables()
    {
        $id = Yii::$app->getRequest()->getBodyParam('id');
        $alumno = Alumno::findOne($id);
        return $alumno->getNotas()
                      ->select(['gestion','materia','puntaje'])
                      ->all();
    }
    public function actionNotas()
    {
        
        $id = Yii::$app->getRequest()->getBodyParam('id');
        try{
        $alumno = Alumno::find()
                          ->select(['nota.gestion','materia.nombre','nota.puntaje','alumno.nombres'])
                          ->leftJoin('nota','nota.alumno=alumno.id')
                          ->leftJoin('materia','nota.materia = materia.id')
                          ->where(['alumno.id'=>$id])
                          ->asArray()
                          ->all();
        }catch(Exception $ue){
            return $ue;
        }
        return $alumno;
    }
    

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionRegisters(){
        $body = Yii::$app->getRequest()->getBodyParams();
        $model = new Alumno();
        $model->load($body,'');
        if(!$model->save()){
            return $model->errors;
        }
        return $model;

    }

}
