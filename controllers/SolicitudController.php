<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * Description of SolicitudController
 *
 * @author root
 */
class SolicitudController extends Controller {
    //put your code here
     public function actionIndex() {
        $data = null;
        //$Model = new Medico();
        //$dataProvider = $Model->consultarMedicos($data);
        return $this->render('index', [
                    'model' => $dataProvider,
        ]);
    }
}
