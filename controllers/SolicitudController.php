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
            $model = new MceFormularioTemp;
            $data = Yii::$app->request->post();
            $accion = isset($data['ACCION']) ? $data['ACCION'] : "";
            if ($accion == "Create") {
                if (Yii::$app->params["adminRegister"] && Yii::$app->session->get('PB_iduser') == 1) {
                    // se registra al cliente
                    Yii::$app->session->set('PB_idregister', 0);
                    $data_4 = isset($data['DATA_4']) ? $data['DATA_4'] : array();
                    $persona = new \app\models\Persona();
                    if ($data_4[0]["user_name"] != "" && $data_4[0]["user_lastname"] != "" && $data_4[0]["user_email"] != "") {
                        $persona->per_nombres = $data_4[0]["user_name"];
                        $persona->per_apellidos = $data_4[0]["user_lastname"];
                        $persona->per_correo = $data_4[0]["user_email"];
                        $persona->save();
                        $id_persona = $persona->per_id;
                        // segundo se crea a usuario
                        $usuario = new \app\models\Usuario();
                        $security = new \yii\base\Security();
                        $password = $security->generateRandomString();
                        $usuario->crearUsuario($data_4[0]["user_email"], $password, $id_persona);
                        $usu_id = $usuario->usu_id;
                        // tercero se crea los permisos del usuario creado grupo3 rol3
                        $grupo_rol = new \app\models\GrupoRol();
                        $grupo_rol->gru_id = 2; // Grupo Licenciatario
                        $grupo_rol->rol_id = 2; // Rol Licenciatario
                        $grupo_rol->usu_id = $usu_id;

                        $grupo_rol->save();

                        $grup_id = $grupo_rol->grol_id;
                        // crear grup_obmo_grup_rol
                        $datagmod = array(14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25);
                        for ($i = 0; $i < count($datagmod); $i++) {
                            $grup_obmo = new \app\models\GrupObmoGrupRol();
                            $grup_obmo->grol_id = $grup_id;
                            $grup_obmo->gmod_id = $datagmod[$i];
                            $grup_obmo->save();
                        }
                        $registroMce = new \app\models\MceRegistro();
                        $registroMce->usu_id = $usu_id;
                        $registroMce->save();
                        Yii::$app->session->set('PB_idregister', $registroMce->reg_id);
                    }
                }
                //Nuevo Registro
                $resul = $model->insertarSolicitud($data);
            } else if ($accion == "Update") {
                //Modificar Registro
                $resul = $model->actualizarSolicitud($data);
            }
            if ($resul['status']) {
                if ($accion == "Create") {
                    $source = $_SERVER['DOCUMENT_ROOT'] . Url::base() . Yii::$app->params["documentFolder"] . $resul['cedula'];
                    $target = $_SERVER['DOCUMENT_ROOT'] . Url::base() . Yii::$app->params["documentFolder"] . $resul['cedula'] . '_' . $resul['ids'];
                    rename($source, $target); //Renombrar el Directorio                    
                }

                $message = ["info" => Yii::t('exception', '<strong>Well done!</strong> your information was successfully saved.')];
                echo Utilities::ajaxResponse('OK', 'alert', Yii::t('jslang', 'Success'), 'false', $message, $resul);
            } else {
                $message = ["info" => Yii::t('exception', 'The above error occurred while the Web server was processing your request.')];
                echo Utilities::ajaxResponse('NO_OK', 'alert', Yii::t('jslang', 'Error'), 'false', $message);
            }
            return;
        }
    }
    
    
}
