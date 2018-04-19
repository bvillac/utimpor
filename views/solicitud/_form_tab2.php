<?php
/*
 * Byron Villacreses <byronvillacreses@gmail.com>
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;
use kartik\date\DatePicker;
?>


<div class="col-md-12">
    <h3><?= Yii::t("perfil", "Referencia Comerciales") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_per_inf" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Informante") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_per_inf" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre persona que Informa") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_car_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Cargo") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce"  id="txt_car_emp" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Cargo") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Empresa") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_emp" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre de la Empresa") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_emp" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="dtp_fec_ref" class="col-sm-3 control-label"><?= Yii::t("perfil", "Fecha") ?></label>
        <div class="col-sm-9">
             <?=
                DatePicker::widget([
                    'id' => 'dtp_fec_ref',
                    'name' => 'dtp_fec_ref',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    //'value' => '23-Feb-1982',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => Yii::$app->params["datePickerDefault"]
                    ],
                    'options' => [
                        'class' => 'form-control',
                        //'Onchange' => 'actualizarGrid()',
                        'readonly' => 'readonly',
                        'placeholder' => Yii::t("perfil", "Fecha")//'Enter birth date ...'
                    ]
                ]);
                ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txta_obs_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Observación") ?></label>
        <div class="col-sm-9">
            <textarea id="txta_obs_emp" class="form-control" rows="2" placeholder="Enter ..."></textarea>
        </div>
    </div>
</div>

<!-- PARTE 2 -->
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_per_inf" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Informante") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_per_inf" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre persona que Informa") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_car_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Cargo") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce"  id="txt_car_emp" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Cargo") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Empresa") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_emp" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre de la Empresa") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_emp" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="dtp_fec_ref" class="col-sm-3 control-label"><?= Yii::t("perfil", "Fecha") ?></label>
        <div class="col-sm-9">
             <?=
                DatePicker::widget([
                    'id' => 'dtp_fec_ref',
                    'name' => 'dtp_fec_ref',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    //'value' => '23-Feb-1982',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => Yii::$app->params["datePickerDefault"]
                    ],
                    'options' => [
                        'class' => 'form-control',
                        //'Onchange' => 'actualizarGrid()',
                        'readonly' => 'readonly',
                        'placeholder' => Yii::t("perfil", "Fecha")//'Enter birth date ...'
                    ]
                ]);
                ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txta_obs_emp" class="col-sm-3 control-label"><?= Yii::t("perfil", "Observación") ?></label>
        <div class="col-sm-9">
            <textarea id="txta_obs_emp" class="form-control" rows="2" placeholder="Enter ..."></textarea>
        </div>
    </div>
</div>

<div class="col-md-12">
    <h3><?= Yii::t("perfil", "Referencia Bancaria") ?></h3>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_banco" class="col-sm-3 control-label"><?= Yii::t("perfil", "Banco") ?></label>
        <div class="col-sm-9">
            <?=
            Html::dropDownList(
                    "cmb_banco", 0, ['0' => Yii::t('formulario', '-Select-')] + ArrayHelper::map(app\models\Utilities::consulBancos(), 'Ids', 'Nombre'), ["class" => "form-control", "id" => "cmb_banco"]
            )
            ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_num_cta" class="col-sm-3 control-label"><?= Yii::t("perfil", "N°Cuenta") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="15" class="form-control PBvalidation keyupmce"  id="txt_num_cta" data-type="numero" data-keydown="true" placeholder="<?= Yii::t("perfil", "N°Cuenta") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_tip_cta" class="col-sm-3 control-label"><?= Yii::t("perfil", "Tipo Cuenta") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_tip_cta", 0, app\models\Utilities::tipoCuentaBanco(), ["class" => "form-control", "id" => "cmb_tip_cta"]) ?>
        </div>
    </div>
</div>


<!--<div class="col-md-6">
    <div class="form-group">
        <label for="dtp_fec_ape" class="col-sm-3 control-label"><?= Yii::t("perfil", "F.Apertura") ?></label>
        <div class="col-sm-9">
            <?=
                DatePicker::widget([
                    'id' => 'dtp_fec_ape',
                    'name' => 'dtp_fec_ape',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    //'value' => '23-Feb-1982',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => Yii::$app->params["datePickerDefault"]
                    ],
                    'options' => [
                        'class' => 'form-control',
                        //'Onchange' => 'actualizarGrid()',
                        'readonly' => 'readonly',
                        'placeholder' => Yii::t("perfil", "F.Apertura")//'Enter birth date ...'
                    ]
                ]);
                ?>
            
        </div>
    </div>
</div>-->

<div class="col-md-6">
    <div class="form-group">
        <label for="rbt_op" class="col-sm-3 control-label"><?= Yii::t("perfil", "Credito") ?></label>
        <div class="col-sm-9">
            <label>
                <input type="radio" name="rbt_op" id="rbt_op1" value="S" checked="">
                SI
            </label>
            <label>
                <input type="radio" name="rbt_op" id="rbt_op2" value="N">
                NO
            </label>
        </div>
    </div>

</div>
<!--<div class="col-md-6">
    <div class="col-sm-3">  
        <?= Html::a('<span class="glyphicon glyphicon-erase"></span> ' . Yii::t("accion", "Limpiar"), 'javascript:', ['id' => 'cmd_clearCita','class' => 'btn btn-primary btn-block']); ?>   
    </div>
    <div class="col-sm-3">  
        <?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t("accion", "Save"), 'javascript:', ['id' => 'cmd_saveCita','class' => 'btn btn-primary btn-block']); ?>   
    </div>
</div>
<div class="col-md-12">
        <div class="form-group">
            <div class="col-md-2">
                <a id="add_Producto" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span><?= Yii::t("formulario", "Add Product") ?></a>
            </div>
        </div>  
    </div>-->

<div class="col-md-12">
    <div class="form-group">
        <div class="box-body table-responsive no-padding">
            <table  id="TbG_Productos" class="table table-hover">
                <thead>
                    <tr>
                        <th style="display:none; border:none;"><?= Yii::t("formulario", "Ids") ?></th>
                        <th><?= Yii::t("formulario", "Banco") ?></th>
                        <th><?= Yii::t("formulario", "T.Cuenta") ?></th>
                        <th><?= Yii::t("formulario", "Número") ?></th>
                        <th><?= Yii::t("formulario", "Credito") ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-md-12">
    <h3><?= Yii::t("perfil", "Referencia Familiares") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_per" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Parentesco") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_per" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre Parentesco") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_res" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Residencía") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_res" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Residencía") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_dir_per" class="col-sm-3 control-label"><?= Yii::t("perfil", "Address") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_dir_per" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Address") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_tra" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Trabajo") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_tra" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Trabajo") ?>">
        </div>
    </div>
</div>

<!-- PARTE 2 -->

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_nom_per" class="col-sm-3 control-label"><?= Yii::t("perfil", "Nombre Parentesco") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_nom_per" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "Nombre Parentesco") ?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_res" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Residencía") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_res" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Residencía") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_dir_per" class="col-sm-3 control-label"><?= Yii::t("perfil", "Address") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_dir_per" data-type="all" data-keydown="true" placeholder="<?= Yii::t("perfil", "Address") ?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="txt_tel_tra" class="col-sm-3 control-label"><?= Yii::t("perfil", "Teléfono Trabajo") ?></label>
        <div class="col-sm-9">
            <input type="text" maxlength="13" class="form-control PBvalidation keyupmce"  id="txt_tel_tra" data-type="celular" data-keydown="true" placeholder="<?= Yii::t("perfil", "Teléfono Trabajo") ?>">
        </div>
    </div>
</div>


<div class="row"></div>