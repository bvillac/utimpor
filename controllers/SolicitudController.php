<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Provincia;
use app\models\Canton;
use app\models\Persona;
use app\models\Usuario;
use app\models\Utilities;
use \app\models\cls_MG0024_Ado;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Description of SolicitudController
 *
 * @author root
 */
class SolicitudController extends Controller {
    
    private $id_pais = 56; //Id Pertenece al Pais Ecuador
    
    //put your code here
     public function actionIndex() {
        $data = null;
        //$Model = new Medico();
        //$dataProvider = $Model->consultarMedicos($data);
        return $this->render('index', [
                    'model' => $dataProvider,
        ]);
    }
    
    public function actionCreate() {
        $data = null;
        //$Model = new Medico();
        //$dataProvider = $Model->consultarMedicos($data);        
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            if (isset($data["getcantones"])) {
                $cantones = Canton::getCantonesByProvinciaID($data['prov_id']);
                $message = [
                    "cantones" => $cantones,
                ];
                echo Utilities::ajaxResponse('OK', 'alert', Yii::t('jslang', 'Success'), 'false', $message);
                return;
            }
            
        }
        //$paises = Pais::getPaises();
        $provincias = array();
        $cantones = array();
        $provincias = Provincia::getProvinciasByPaisID($this->id_pais);
        if (count($provincias) > 0) {
            $cantones = Canton::getCantonesByProvinciaID($provincias[0]["Ids"]);
        }
        return $this->render('create', [
                    "provincias" => $provincias,
                    "estCivil" => Utilities::estadoCivil(),
                    "genero" => Utilities::genero(),
                    "cantones" => $cantones]);
    }
    
     public function actionSave() {
        if (Yii::$app->request->isAjax) {
            $model = new cls_MG0024_Ado();
            $data = Yii::$app->request->post();
            $accion = isset($data['ACCION']) ? $data['ACCION'] : "";
            if ($accion == "Create") {
                //Nuevo Registro
                $resul = $model->insertarSolicitud($data);
            }else if($accion == "Update"){
                //Modificar Registro
                $resul = $model->actualizarPacientes($data);                
            }
            if ($resul['status']) {
                $message = ["info" => Yii::t('exception', '<strong>Well done!</strong> your information was successfully saved.')];
                echo Utilities::ajaxResponse('OK', 'alert', Yii::t('jslang', 'Success'), 'false', $message,$resul);
            }else{
                $message = ["info" => Yii::t('exception', 'The above error occurred while the Web server was processing your request.')];
                echo Utilities::ajaxResponse('NO_OK', 'alert', Yii::t('jslang', 'Error'), 'false', $message);
            }
            return;
        }   
    }
}
