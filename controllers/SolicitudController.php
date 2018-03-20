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
            
        }
        
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
    
    
}
