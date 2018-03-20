<?php
/*
 * The PenBlu framework is free software. It is released under the terms of
 * the following BSD License.
 *
 * Copyright (C) 2015 by PenBlu Software (http://www.penblu.com)
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *  - Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in
 *    the documentation and/or other materials provided with the
 *    distribution.
 *  - Neither the name of PenBlu Software nor the names of its
 *    contributors may be used to endorse or promote products derived
 *    from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * PenBlu is based on code by
 * Yii Software LLC (http://www.yiisoft.com) Copyright Â© 2008
 *
 * Authors:
 *
 * Eduardo Cueva <edu19432@gmail.com>
 * Byron Villacreses <byronvillacreses@gmail.com>
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;
?>


    <!--<h2><?= Yii::t("formulario", "Objective of the brand and commitment") ?></h2>-->
<div class="col-md-6">
    <h3><?= Yii::t("formulario", "Objective Using the Brand") ?></h3>
    <div class="form-group">
        <div class="col-sm-12">
            <?=
            Html::dropDownList(
                    "cmb_objetivo", 0, ['0' => Yii::t('formulario', '-Select-')] + ArrayHelper::map($objetivos, 'obj_id', 'obj_nombre'), ["class" => "form-control", "id" => "cmb_objetivo"]
            )
            ?>
        </div>
    </div>
    <h5><?= Yii::t("formulario", "Because you want to use the country brand Ecuador loves life?") ?></h5>
    <div class="form-group">
        <div class="col-sm-12">
            <?php
            /*Html::dropDownList(
                    "cmb_subobjetivo", 0, ArrayHelper::map($subobjetivos, 'id', 'name'), ["class" => "form-control", "id" => "cmb_subobjetivo"]
            )*/
            ?>
            <textarea class="form-control PBvalidation keyupmce" rows="2"  id="txt_ftem_detalle" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Because you want to use the country brand Ecuador loves life?") ?>"></textarea>
        </div>
    </div>
</div>

<div class="col-md-12">
    <h3><?= Yii::t("formulario", "Business commitment with Ecuador") ?></h3>
<!--        <h5><?= Yii::t("formulario", "Briefly describe the following information") ?></h5>-->
    <div class="form-group">
        <label for="txt_ftem_giroprincipal" class="col-sm-2 control-label"><?= Yii::t("formulario", "Activity") ?></label>
        <div class="col-sm-9">
            <textarea class="form-control PBvalidation keyupmce" rows="2"  id="txt_ftem_giroprincipal" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Company activity: Manufacture of straw hats") ?>"></textarea>
<!--            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_giroprincipal" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("formulario", "Company activity: Manufacture of straw hats") ?>">-->
        </div>
    </div>
    <!--<div class="form-group">
        <label for="txt_ftem_vision" class="col-sm-2 control-label"><?= Yii::t("formulario", "Vision") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_vision" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("formulario", "Describe your vision") ?>">
        </div>
    </div>-->

    <div class="form-group">
        <label for="txt_ftem_mision" class="col-sm-2 control-label"><?= Yii::t("formulario", "Mission") ?></label>
        <div class="col-sm-9">
<!--            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_mision" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("formulario", "Describes its mission") ?>">-->
            <textarea class="form-control PBvalidation keyupmce" rows="2"  id="txt_ftem_mision" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Describes its mission") ?>"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="txt_ftem_referencia" class="col-sm-2 control-label"><?= Yii::t("formulario", "Referencia") ?></label>
        <div class="col-sm-9">
            <textarea class="form-control PBvalidation keyupmce" rows="2"  id="txt_ftem_referencia" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Referencia") ?>"></textarea>
<!--            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_referencia" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("formulario", "Referencia") ?>">-->
            <p><?= Yii::t("formulario", "(Mention the contribution to the growth of the country, if it is responsibly towards society and the environment, etc)") ?></p>
        </div>
    </div>

    <div class="form-group">
        <label for="cmb_ftem_trayectoria" class="col-sm-2 control-label"><?= Yii::t("formulario", "Trajectory") ?></label>
        <div class="col-sm-3">
<!--            <input type="text" maxlength="3" class="form-control PBvalidation keyupmce" id="txt_ftem_trayectoria" data-type="number" data-keydown="true" placeholder="<?= Yii::t("formulario", "In years experience in: 1") ?>">-->
            <?= Html::dropDownList("cmb_ftem_trayectoria", 0, $trayectoria, ["class" => "form-control", "id" => "cmb_ftem_trayectoria"]) ?>
        </div>
    </div>


</div>
<div class="col-md-12">
    <h3><?= Yii::t("formulario", "Attach documents") ?></h3>
    <div class="info-alertpb"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;<?= Yii::t("formulario", "(Must attach files in jpg, png or pdf with a maximum weight of 1MB per file)") ?></div>
   
    <div class="form-group">
        <label for="txt_ftem_trayectoria_file" class="col-sm-2 control-label"><?= Yii::t("formulario", "Attach") ?></label>
        <div class="col-sm-8">
            <?php
            /*echo FileInput::widget([
                'id' => 'txt_ftem_trayectoria_file',
                'name' => 'file',
                'pluginOptions' => [
                    //'previewFileType' => 'any', 
                    'showPreview' => false,
                    'browseLabel' => Yii::t("formulario", "Examine"),
                    'uploadUrl' => Url::to(['/mceformulariotemp/uploadfile']),
                    'allowedFileExtensions' => Yii::$app->params["FileExtensions"],
                    'initialCaption' => Yii::t("formulario", "Attach reference path (Optional)"),
                //'allowedFileExtensions' => ['png']
                ],
                'options' => ['accept' => 'image/*'],
            ]);*/
            ?>
            <input id="txt_ftem_trayectoria_file" name="file" type="file" class="file-loading" >
            <?= Html::hiddenInput('txth_ftem_trayectoria_file', '',['id' =>'txth_ftem_trayectoria_file']); ?>
        </div>
    </div>
     <div id="div_ftem_imp_renta" class="form-group" style="display: none">
        <label for="txt_ftem_imp_renta_file" class="col-sm-2 control-label"><?= Yii::t("formulario", "Income tax") ?></label>
        <div class="col-sm-8">
            <?php
            /*echo FileInput::widget([
                'id' => 'txt_ftem_imp_renta',
                'name' => 'file',
                'pluginOptions' => [
                    //'previewFileType' => 'any', 
                    'showPreview' => false,
                    'browseLabel' => Yii::t("formulario", "Examine"),
                    'uploadUrl' => Url::to(['/mceformulariotemp/uploadfile']),
                    'allowedFileExtensions' => Yii::$app->params["FileExtensions"],
                    'initialCaption' => Yii::t("formulario", "Attach wing Income Tax (Path> 1 Year)"),
                //'allowedFileExtensions' => ['png']
                ],
                'options' => ['accept' => 'image/*'],
            ]);*/
            ?>
            <input id="txt_ftem_imp_renta_file" name="file" type="file" class="file-loading" >
            <?= Html::hiddenInput('txth_ftem_imp_renta_file', '',['id' =>'txth_ftem_imp_renta_file']); ?>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <h3><?= Yii::t("formulario", "Ability to raise the countrys image") ?></h3>
    <h5><?= Yii::t("formulario", "Where the Country Brand is sold") ?></h5>
</div>

<div class="col-md-6">

    <div class="form-group">
        <label for="cmb_provincia_uso" class="col-sm-3 control-label"><?= Yii::t("formulario", "Level National") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_provincia_uso", 25, ArrayHelper::map($provincias, 'prov_id', 'prov_nombre'), ["class" => "form-control multiselect", 'multiple' => 'multiple', "id" => "cmb_provincia_uso"])
            ?>
            <p style="margin-top:5px"><?= Yii::t("formulario", "You can select more than one option by pressing") ?></p>
        </div>
    </div>

</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_pais_uso" class="col-sm-3 control-label"><?= Yii::t("formulario", "Level International") ?></label>
        <div class="col-sm-9">
            <?= Html::dropDownList("cmb_pais_uso", 0, ArrayHelper::map($pais, 'pai_id', 'pai_nombre'), ["class" => "form-control multiselect", 'multiple' => 'multiple', "id" => "cmb_pais_uso"])
            ?>

            <p style="margin-top:5px"><?= Yii::t("formulario", "You can select more than one option by pressing") ?></p>
        </div>

    </div>
</div>
<div class="row"> 
    <div class="col-md-2">
        <a id="paso2back" href="javascript:" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-menu-left"></span><?= Yii::t("formulario", "Back") ?></a>
    </div>
    <div class="col-md-8"></div>
    <!--        <div class="col-md-2">
                <a id="btn_save_2" href="javascript:" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> <?= Yii::t("Accion", "Save") ?></a>
            </div>-->
    <div class="col-md-2">
        <a id="paso2next" href="javascript:" class="btn btn-primary btn-block"><?= Yii::t("formulario", "Next") ?> <span class="glyphicon glyphicon-menu-right"></span></a>
    </div>
</div>

