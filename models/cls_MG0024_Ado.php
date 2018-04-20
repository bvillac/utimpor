<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of cls_MG0024_Ado
 *
 * @author root
 */
class cls_MG0024_Ado extends \yii\db\ActiveRecord {
    //SOLICITUD DE CREDITO
    public static function tableName()
    {
        return 'mg0024';
    }
    
    /* INSERTAR DATOS */

    public function insertarSolicitud($data) {
        $arroout = array();
        $con = \Yii::$app->db;
        $trans = $con->beginTransaction();
        try {
            $data = isset($data['DATA']) ? $data['DATA'] : array();
            $this->insertarDataInfo($con, $data);
            
            
            
            $per_id = $con->getLastInsertID(); //IDS de la Persona
            Persona::insertarDataPerfilDatoAdicional($con, $data, $per_id);
            $this->insertarDataPaciente($con, $data, $per_id);
            $pac_id = $con->getLastInsertID();
            //Inserta Datos de Usuario
            $password = Utilities::generarCodigoKey(8); //Passw Generado Automaticamente
            $linkActiva = Usuario::crearLinkActivacion();
            Usuario::insertarDataUser($con, $data[0]['per_correo'], $password, $per_id, $linkActiva);
            $usu_id = $con->getLastInsertID(); //IDS de la Persona
            Rol::saveEmpresaRol($con, $usu_id, 1, $this->rolDefault); //Empresas 1 Por Defecto
            //###############################

            Utilities::insertarLogs($con, $pac_id, 'paciente', 'Insert -> Pac_id,Per_id,Usu_id');
            $trans->commit();
            $con->close();
            //RETORNA DATOS 
            $arroout["status"] = true;

            //Enviar correo electronico para activacion de cuenta
            $nombres = $data[0]['per_nombre'];
            $tituloMensaje = Yii::t("register", "Successful Registration");
            $asunto = Yii::t("register", "User Register") . " " . Yii::$app->params["siteName"];
            $body = Utilities::getMailMessage("registerPaciente", array("[[user]]" => $nombres, "[[username]]" => $data[0]['per_correo'], "[[clave]]" => $password, "[[link_verification]]" => $linkActiva), Yii::$app->language);
            Utilities::sendEmail($tituloMensaje, Yii::$app->params["adminEmail"], [$data[0]['per_correo'] => $data[0]['per_nombre'] . " " . $data[0]['per_apellido']], [], //Bcc
                    $asunto, $body);
            //Find Datos Mail

            return $arroout;
        } catch (\Exception $e) {
            $trans->rollBack();
            $con->close();
            //throw $e;
            $arroout["status"] = false;
            return $arroout;
        }
    }
    
    public function insertarDataInfo($con,$data) { 
        //Datos de Perfil        
//         ids_sol,cod_pto,cod_caj,tip_doc,num_doc,fec_ing,fec_cad,ids_prp,cod_emp,cod_i_r,
//         ced_ruc,tip_con,raz_soc,nom_rpl,nom_due,nom_ger,tip_emp,ano_act,cod_pai,cod_ciu,
//         dir_rpl,corre_e,act_com,tel_cel,tel_n01,num_fax,nom_cto,tel_cto,idforma,cre_sol,
//         lim_cre,max_cre,lim_dia,tip_viv,tim_viv,nom_arr,tel_arr,tip_loc,tim_loc,nom_arl,
//         tel_arl,veh_mar,veh_val,pre_hip,cut_men,est_aut,fec_aut,obs_gen,obs_aut,est_log,
//         fec_cre,fec_mod,usuario,equipo

        $sql = "INSERT INTO " . $con->dbname . ".mg0024
        (cod_emp,cod_i_r,ced_ruc,tip_con,raz_soc,tip_emp,ano_act,cod_pai,cod_ciu,
        dir_rpl,corre_e,act_com,tel_cel,tel_n01,nom_cto,idforma,cre_sol,
        lim_cre,max_cre,lim_dia,tip_viv,tim_viv,nom_arr,tel_arr,tip_loc,tim_loc,nom_arl,
        tel_arl,veh_mar,veh_val,pre_hip,cut_men,est_aut,obs_gen,est_log,fec_cre,usuario,equipo)VALUES
        (cod_emp,cod_i_r,ced_ruc,tip_con,raz_soc,tip_emp,ano_act,cod_pai,cod_ciu,
        dir_rpl,corre_e,act_com,tel_cel,tel_n01,nom_cto,idforma,cre_sol,
        lim_cre,max_cre,lim_dia,tip_viv,tim_viv,nom_arr,tel_arr,tip_loc,tim_loc,nom_arl,
        tel_arl,veh_mar,veh_val,pre_hip,cut_men,est_aut,obs_gen,est_log,fec_cre,usuario,equipo); ";
        $command = $con->createCommand($sql);
        
        //$command->bindParam(":ids_sol", $data[0]['ids_sol'], \PDO::PARAM_INT);//Id Comparacion
        $command->bindParam(":cod_emp", $data[0]['cod_emp'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":ced_ruc", $data[0]['ced_ruc'], \PDO::PARAM_STR);
        $command->bindParam(":tip_con", $data[0]['tip_con'], \PDO::PARAM_STR);
        $command->bindParam(":raz_soc", $data[0]['raz_soc'], \PDO::PARAM_STR);
        $command->bindParam(":tip_emp", $data[0]['tip_emp'], \PDO::PARAM_STR);
        $command->bindParam(":ano_act", $data[0]['ano_act'], \PDO::PARAM_STR);
        $command->bindParam(":cod_pai", $data[0]['cod_pai'], \PDO::PARAM_STR);
        $command->bindParam(":cod_ciu", $data[0]['cod_ciu'], \PDO::PARAM_STR);
        $command->bindParam(":dir_rpl", $data[0]['dir_rpl'], \PDO::PARAM_STR);
        $command->bindParam(":corre_e", $data[0]['corre_e'], \PDO::PARAM_STR);
        $command->bindParam(":act_com", $data[0]['act_com'], \PDO::PARAM_STR);
        $command->bindParam(":tel_cel", $data[0]['tel_cel'], \PDO::PARAM_STR);
        $command->bindParam(":tel_n01", $data[0]['tel_n01'], \PDO::PARAM_STR);
        $command->bindParam(":nom_cto", $data[0]['nom_cto'], \PDO::PARAM_STR);
        $command->bindParam(":idforma", $data[0]['idforma'], \PDO::PARAM_INT);
        $command->bindParam(":cre_sol", $data[0]['cre_sol'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        $command->bindParam(":cod_i_r", $data[0]['cod_i_r'], \PDO::PARAM_STR);
        
        
        
        
        
        
        
        $command->bindParam(":per_ced_ruc", $data[0]['per_ced_ruc'], \PDO::PARAM_STR);        
        $command->bindParam(":per_genero", $data[0]['per_genero'], \PDO::PARAM_STR);
        $command->bindParam(":per_fecha_nacimiento", $data[0]['per_fecha_nacimiento'], \PDO::PARAM_STR);
        $command->bindParam(":per_estado_civil", $data[0]['per_estado_civil'], \PDO::PARAM_STR);
        $command->bindParam(":per_correo", $data[0]['per_correo'], \PDO::PARAM_STR);
        $command->bindParam(":per_tipo_sangre", $data[0]['per_tipo_sangre'], \PDO::PARAM_STR);
        $command->bindParam(":per_foto", $data[0]['per_foto'], \PDO::PARAM_STR);
        $command->execute();
    }

}
