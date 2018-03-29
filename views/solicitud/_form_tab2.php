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


<div class="col-md-6">
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
</div>

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

<div class="row"></div>