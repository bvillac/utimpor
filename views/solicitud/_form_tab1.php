<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;
use kartik\date\DatePicker;
?>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_sol" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tipo Solicitud") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_tip_sol", 0, app\models\Utilities::tipoSolicitud(), ["class" => "form-control", "id" => "cmb_tip_sol"]) ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h3><?= Yii::t("perfil", "Información Básica") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_raz_soc" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombres/Razón.Social") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_raz_soc" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre / Razón Social") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_ced_ruc" class="col-sm-3 control-label"><?= Yii::t("perfil", "Documento") ?></label>
        <div class="col-sm-3">
            <?= Html::dropDownList("cmb_cod_i_r", 0, app\models\Utilities::tipoIdentificacion(), ["class" => "form-control", "id" => "cmb_cod_i_r"]) ?>
        </div>
        <div class="col-sm-6">
            <input type="text" maxlength="15" class="form-control PBvalidation keyupmce" id="txt_ced_ruc" data-type="cedula" data-keydown="true" placeholder="<?= Yii::t("perfil", "National identity document") ?>">
        </div>
        
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_con" class="col-sm-3 control-label"><?= Yii::t("formulario", "Contribuyente") ?></label>
        <div class="col-sm-9">
            <?=
            Html::dropDownList(
                    "cmb_tip_con", 0,  ArrayHelper::map(app\models\Utilities::tipoContribuyente(), 'COD_CON', 'NOM_CON'), ["class" => "form-control", "id" => "cmb_tip_con"]
            )
            ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tipo Empresa") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_tip_emp", 0, app\models\Utilities::tipoEmpresa(), ["class" => "form-control", "id" => "cmb_tip_emp"]) ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_rpl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Representante Legal") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_rpl" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Representante Legal") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_corre_e" class="col-sm-3 control-label"><?= Yii::t("perfil", "Email") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation" id="txt_corre_e" data-type="email" data-keydown="true" placeholder="<?= Yii::t("perfil", "Email") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_act_com" class="col-sm-3 control-label"><?= Yii::t("perfil", "Act.Comercial") ?></label>
        <div class="col-sm-3">
            <?= Html::dropDownList("cmb_act_com", 0, app\models\Utilities::actividadComercial(), ["class" => "form-control", "id" => "cmb_act_com"]) ?>
        </div>
        <div class="col-sm-6">
            <input type="text" maxlength="60" class="form-control PBvalidation keyupmce" id="txt_act_com" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Actividad Comercial") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_ano_act" class="col-sm-3 control-label"><?= Yii::t("formulario", "Trajectory") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_ano_act", 0, app\models\Utilities::trayectoriaAnos(), ["class" => "form-control", "id" => "cmb_ano_act"]) ?>
        </div>
    </div>   
</div>









<div class="col-md-12">
    <h3><span><?= Yii::t("perfil", "Place and Residence") ?></span></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_provincia" class="col-sm-3 control-label"><?= Yii::t("formulario", "State") ?></label>
        <div class="col-sm-9">
            <select id="cmb_provincia" class="form-control">
                <?php
                foreach ($provincias as $key2 => $value2) {
                    $name = $value2["Nombre"];
                    $id = $value2["Ids"];
                    if ($id <> 25) {//Para No presentar TODAS
                        echo "<option value='" . $id . "'>" . $name . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_ciudad" class="col-sm-3 control-label"><?= Yii::t("formulario", "City") ?></label>
        <div class="col-sm-9">
            <select id="cmb_ciudad" class="form-control">
                <?php
                foreach ($cantones as $key3 => $value3) {
                    $name = $value3["Nombre"];
                    $id = $value3["Ids"];
                    echo "<option value='" . $id . "'>" . $name . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_dir_rpl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Address") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_dir_rpl" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Address") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_n01" class="col-sm-3 control-label"><?= Yii::t("perfil", "Phone") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_n01" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Phone") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_cto" class="col-sm-3 control-label"><?= Yii::t("perfil", "Contact") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_cto" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("perfil", "Contact") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_cel" class="col-sm-3 control-label"><?= Yii::t("perfil", "CellPhone") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_cel" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "CellPhone") ?>">
        </div>
    </div>
</div>


<div class="col-md-12">
    <h3><?= Yii::t("perfil", "Representante Legal") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_rpl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombres") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_rpl" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombres") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_ced_rpl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Documento") ?></label>
        <div class="col-sm-3">
            <?= Html::dropDownList("cmb_ced_rpl", 0, app\models\Utilities::tipoIdentificacion(), ["class" => "form-control", "id" => "cmb_ced_rpl"]) ?>
        </div>
        <div class="col-sm-6">
            <input type="text" maxlength="15" class="form-control PBvalidation keyupmce" id="txt_ced_rpl" data-type="cedula" data-keydown="true" placeholder="<?= Yii::t("perfil", "National identity document") ?>">
        </div>
        
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_con" class="col-sm-3 control-label"><?= Yii::t("formulario", "Contribuyente") ?></label>
        <div class="col-sm-9">
            <?=
            Html::dropDownList(
                    "cmb_tip_con", 0,  ArrayHelper::map(app\models\Utilities::tipoContribuyente(), 'COD_CON', 'NOM_CON'), ["class" => "form-control", "id" => "cmb_tip_con"]
            )
            ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tipo Empresa") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_tip_emp", 0, app\models\Utilities::tipoEmpresa(), ["class" => "form-control", "id" => "cmb_tip_emp"]) ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_rpl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Representante Legal") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_rpl" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Representante Legal") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_corre_e" class="col-sm-3 control-label"><?= Yii::t("perfil", "Email") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation" id="txt_corre_e" data-type="email" data-keydown="true" placeholder="<?= Yii::t("perfil", "Email") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_act_com" class="col-sm-3 control-label"><?= Yii::t("perfil", "Act.Comercial") ?></label>
        <div class="col-sm-3">
            <?= Html::dropDownList("cmb_act_com", 0, app\models\Utilities::actividadComercial(), ["class" => "form-control", "id" => "cmb_act_com"]) ?>
        </div>
        <div class="col-sm-6">
            <input type="text" maxlength="60" class="form-control PBvalidation keyupmce" id="txt_act_com" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Actividad Comercial") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_ano_act" class="col-sm-3 control-label"><?= Yii::t("formulario", "Trajectory") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_ano_act", 0, app\models\Utilities::trayectoriaAnos(), ["class" => "form-control", "id" => "cmb_ano_act"]) ?>
        </div>
    </div>   
</div>




<div class="row"></div>