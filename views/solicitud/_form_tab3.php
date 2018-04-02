<?php
/*
 * Byron Villacreses <byronvillacreses@gmail.com>
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\widgets\PbGridView\PbGridView;
use branchonline\lightbox\Lightbox;
?>

<div class="col-md-12">
    <h3><?= Yii::t("formulario", "Bienes o Patrimonios") ?></h3>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_viv" class="col-sm-3 control-label"><?= Yii::t("perfil", "Vivienda") ?></label>
        <div class="col-sm-4">
            <?= Html::dropDownList("cmb_tip_viv", 0, app\models\Utilities::tipoBienCasa(), ["class" => "form-control", "id" => "cmb_tip_viv"]) ?>
        </div>
        <div class="col-sm-2">
            <label for="txt_tim_viv" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tiempo") ?></label>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_tim_viv" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Tiempo Casa") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_loc" class="col-sm-3 control-label"><?= Yii::t("perfil", "Local.Comercial") ?></label>
        <div class="col-sm-4">
            <?= Html::dropDownList("cmb_tip_loc", 0, app\models\Utilities::tipoBienLocalComercial(), ["class" => "form-control", "id" => "cmb_tip_loc"]) ?>
        </div>
        <div class="col-sm-2">
            <label for="txt_tim_loc" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tiempo") ?></label>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_tim_loc" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Tiempo Local") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_arr" class="col-sm-3 control-label"><?= Yii::t("perfil", "Arrendatario Vivienda") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_arr" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre Arrendatario Vivienda") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_arr" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Arrendatario") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_arr" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Arrendatario Vivienda") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_arl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Arrendatario Local") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_arl" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre Arrendatario Local") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_arl" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Arrendatario") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_arl" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Arrendatario Local") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_veh_mar" class="col-sm-3 control-label"><?= Yii::t("perfil", "Vehiculo Marca/Año ") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_veh_mar" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Vehiculo Marca Años") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_veh_val" class="col-sm-3 control-label"><?= Yii::t("perfil", "Valor Vehiculo") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_veh_val" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Valor Vehiculo") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_pre_hip" class="col-sm-3 control-label"><?= Yii::t("perfil", "Préstamos Hipotecario") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_pre_hip" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Préstamos Hipotecario") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_cut_men" class="col-sm-3 control-label"><?= Yii::t("perfil", "Cuota Mensual") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_cut_men" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Cuota Mensual") ?>">
        </div>
    </div>
</div>


<div class="col-md-12">
    <h3><?= Yii::t("formulario", "Aspiración de Crédito.") ?></h3>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_cre_sol" class="col-sm-3 control-label"><?= Yii::t("perfil", "Monto Solicitado") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_cre_sol" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Monto Solicitado") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_idforma" class="col-sm-3 control-label"><?= Yii::t("perfil", "Forma Pago") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_idforma", 0, app\models\Utilities::formaPago(), ["class" => "form-control", "id" => "cmb_idforma"]) ?>
        </div>
    </div>
</div>


<div class="row"></div>