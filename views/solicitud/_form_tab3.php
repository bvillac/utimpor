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
use yii\widgets\DetailView;
use app\widgets\PbGridView\PbGridView;
use branchonline\lightbox\Lightbox;
?>

<div class="col-md-12">
    <h3><?= Yii::t("formulario", "Use of the mark") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="cmb_usomarca" class="col-sm-2 control-label"><?= Yii::t("formulario", "Type") ?></label>
        <div class="col-sm-10">
            <?=
            Html::dropDownList(
                    "cmb_usomarca", 0, ['0' => Yii::t('formulario', '-Select-')] + ArrayHelper::map($usomarca, 'umar_id', 'umar_nombre'), ["class" => "form-control", "id" => "cmb_usomarca"]
            )
            ?>
        </div>
    </div>
</div>

<div id="div_mensOtrosUsos" class="col-md-12"></div>

<!--<div class="col-md-8">
    <h4><?= Yii::t("formulario", "ATTACH AFFIDAVIT.") ?></h4>
    <p><?= Yii::t("formulario", "Download the template") ?> <a href="<?= Url::toRoute(["mceformulariotemp/download", "file" => "declar-jurada.pdf"]) ?>" ><?= Yii::t("formulario", "Here") ?></a>
<?= Yii::t("formulario", "print it. fill it with your signature and scan it using a scanner. Finally, attach it in the field below:") ?> 
    </p>
</div>

<div class="col-md-4">
<?php /* echo FileInput::widget([
  'name' => 'file_decla_jurada',
  'pluginOptions' => [
  //'previewFileType' => 'any',
  'showPreview' => false,
  'uploadUrl' => Url::to([Yii::$app->basePath.Yii::$app->params["documentFolder"]]),
  'allowedFileExtensions' => Yii::$app->params["FileExtensions"],
  'initialCaption'=>Yii::t("formulario", "Attach affidavit"),
  //'browseLabel' =>  'Adat',
  //'allowedFileExtensions' => ['png']
  ],
  'options' => [
  'id' => 'txt_ftem_decl_jurada_file',
  ],
  ]); */
?>
</div>-->

<div id="div_ExporServicio" class="col-md-12">
<!--    <div class="col-md-12">
        <h3><?= Yii::t("formulario", "Exports its services") ?></h3>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="txt_prod_nombre" class="col-sm-2 control-label"></label>
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="rbt_si" value="option1"><?= Yii::t("formulario", "Yes") ?>
            </label>
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="rbt_no" value="option2"><?= Yii::t("formulario", "No") ?>
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txt_ftem_definicion_sector" class="col-sm-3 control-label"><?= Yii::t("formulario", "Define your Sector") ?></label>
            <div class="col-sm-9">
                <textarea class="form-control PBvalidation keyupmce" rows="2" id="txt_ftem_definicion_sector" data-type="alfanumerico" data-keydown="true" placeholder="<?= Yii::t("formulario", "Example: Exports Agricultural Software") ?>"></textarea>
            </div>
        </div>
    </div>-->
</div>

<div id="div_otrasMarca" class="col-md-12"></div>

<div id="div_otrasMarcaOp2" class="col-md-12" style="display: none">
    <h3><?= Yii::t("formulario", "Product Information") ?></h3>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txt_prod_nombre" class="col-sm-3 control-label"><?= Yii::t("formulario", "Name") ?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control keyupmce" id="txt_prod_nombre"  data-keydown="true"  placeholder="<?= Yii::t("formulario", "Name Product") ?>">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cmb_por_id" class="col-sm-3 control-label"><?= Yii::t("formulario", "Production %") ?></label>
            <div class="col-sm-9">
                <?= Html::dropDownList("cmb_por_id", 3, ArrayHelper::map($porcentaje, 'por_id', 'por_nombre'), ["class" => "form-control", "id" => "cmb_por_id"]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txt_detalle_uso" class="col-sm-3 control-label"><?= Yii::t("formulario", "Detail") ?></label>
            <div class="col-sm-9">
                <textarea class="form-control keyupmce" rows="2"  id="txt_detalle_uso"  data-keydown="true" placeholder="<?= Yii::t("formulario", "Detail Product") ?>"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txt_producto_foto" class="col-sm-3 control-label"><?= Yii::t("formulario", "Photo") ?></label>
            <div class="col-sm-9">
                <?php
                /*echo FileInput::widget([
                    'id' => 'txt_producto_foto',
                    'name' => 'file',
                    'pluginOptions' => [
                        //'previewFileType' => 'any', 
                        'showPreview' => false,
                        'browseLabel' => Yii::t("formulario", "Examine"),
                        'uploadUrl' => Url::to(['/mceformulariotemp/uploadfile']),
                        'allowedFileExtensions' => Yii::$app->params["FileExtensions"],
                        'initialCaption' => Yii::t("formulario", "Product Photo"),
                    //'browseLabel' =>  'Adat',
                    //'allowedFileExtensions' => ['png']
                    ],
                    'options' => ['accept' => 'image/*'],
                ]); */
                ?>
                <input id="txt_producto_foto" name="file" type="file" class="file-loading" >
                <?= Html::hiddenInput('txth_producto_foto', '',['id' =>'txth_producto_foto']); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">       
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <b><?= Yii::t("formulario", "Select") ?></b>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label class="checkbox-inline">
                    <input  id="chk_envase" type="checkbox">
                    <?= Yii::t("formulario", "Pack") ?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label class="checkbox-inline">
                    <input  id="chk_empaque" type="checkbox">
                    <?= Yii::t("formulario", "Packing") ?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label class="checkbox-inline">
                    <input  id="chk_etiqueta" type="checkbox">
                    <?= Yii::t("formulario", "Label") ?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label class="checkbox-inline">
                    <input  id="chk_publicidad" type="checkbox">
                    <?= Yii::t("formulario", "Publicity") ?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label class="checkbox-inline">
                    <input  id="chk_otros" type="checkbox">
                    <?= Yii::t("formulario", "Others.") ?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-2">
                <a id="add_Producto" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span><?= Yii::t("formulario", "Add Product") ?></a>
            </div>
        </div>  
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="box-body table-responsive no-padding">
                <table  id="TbG_Productos" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="display:none; border:none;"><?= Yii::t("formulario", "Ids") ?></th>
                            <th><?= Yii::t("formulario", "Name") ?></th>
                            <th><?= Yii::t("formulario", "Production %") ?></th>
                            <th><?= Yii::t("formulario", "Picture") ?></th>
                            <!-- <th><?= Yii::t("formulario", "Detail") ?></th>-->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<div id="div_otrasMarcaOp3" class="col-md-12" style="display: none">
    <h3><?= Yii::t("formulario", "Event information") ?></h3>
    <div class="form-group">
        <label for="txt_eve_nombre" class="col-sm-2 control-label"><?= Yii::t("formulario", "Name") ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_eve_nombre" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Event name") ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="txt_eve_lugar" class="col-sm-2 control-label"><?= Yii::t("formulario", "Date and Place") ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control keyupmce" id="txt_eve_lugar" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Date and Place event") ?>">
        </div>
    </div>
    <!--        <div class="form-group">
                <label for="txt_eve_fecha" class="col-sm-2 control-label"><?= Yii::t("formulario", "Date of the event") ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control PBvalidation" id="txt_eve_fecha" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("formulario", "Date of the event") ?>">
                </div>
            </div>-->
    <div class="form-group">
        <label for="txt_eve_descripcion" class="col-sm-2 control-label"><?= Yii::t("formulario", "Description") ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control keyupmce" id="txt_eve_descripcion" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Description of event") ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="txt_eve_referencia" class="col-sm-2 control-label"><?= Yii::t("formulario", "Reference") ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control keyupmce" id="txt_eve_referencia" data-type="all" data-keydown="true" placeholder="<?= Yii::t("formulario", "Reference event") ?>">
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-12">
            <div class="checkbox">
                <label class="control-label">
                    <input  id="chk_aceptar" type="checkbox">
                    <b><?= Yii::t("formulario", "Accept the terms of the Affidavit") ?></b>
                    <a id="ver_declaracion" class="" data-toggle="modal" data-target=".bs-example-modal-lg" ><?= Yii::t("formulario", "(See Declaration)") ?></a>   
                </label>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-2">
        <a id="paso3back" href="javascript:" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-menu-left"></span><?= Yii::t("formulario", "Back") ?></a>
    </div>
    <div class="col-md-8"></div>
    <!--        <div class="col-md-2">
                <a id="btn_save_3" href="javascript:" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> <?= Yii::t("Accion", "Save") ?></a>
            </div>-->
    <div class="col-md-2">
        <a id="paso3next" href="javascript:" class="btn btn-primary btn-block"><?= Yii::t("Accion", "Send") ?> <span class="glyphicon glyphicon-send"></span></a>
    </div>
</div>

<!-- Inicio Modal solicitud  -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">DECLARACIÓN JURADA</h4>
            </div>
            <div class="modal-body">

                <p>Yo, <strong id="lbl_nombredeclaracion"></strong> (nombre del solicitante o representante legal), declaro que:</p>

                <p>1. La información que presento como parte del trámite para obtener la licencia de uso sobre la Marca País Ecuador Ama la Vida es verdadera y tiene el carácter de Declaración Jurada. En este sentido, manifiesto:</p>
                <p>
                <ol type="a">
                    <li>Realizo actividades conforme al marco legal establecido</li>
                    <li>Cumplo con las normas laborales reguladas en el Ecuador, no vulnerando los derechos fundamentales constitucionalmente reconocidos a mis trabajadores.</li>
                    <li>Cumplo con la normativa ambiental, no generando daños al medio ambiente.</li>
                </ol>	
                </p>

                <p>2. En caso de haber solicitado LICENCIA DE USO EN PRODUCTOS, declaro que los mismos cumplen con al menos con el 40% de componente ecuatoriano, entre materia prima y/o mano de obra, por producto.</p>

                <p>3. Cumpliré con lo estipulado en el Reglamento de Uso de la Marca País Ecuador Ama la Vida y cualquier otra condición que establezca la Secretaria Técnica de la Comisión Estratégica de
                    Marcas.</p>

                <p>4. Mantendré un compromiso de mejora continua con mis trabajadores, clientes, proveedores y Ecuador y su desarrollo social, económico y ambientalmente sostenible.</p>

                <p>5. Pondré a disposición de la Secretaria Técnica de la Comisión Estratégica de Marcas la información sobre el uso de la Marca País Ecuador Ama la Vida que ésta pudiera solicitarme para su monitoreo.</p>

                <p>Fecha de emisión: <strong id="lbl_fechadeclaracion"></strong></p>
                <p>Firma del Representante</p>


            </div>
            <div class="modal-footer">
<!--                <button style="margin-right: 5px;" class="btn btn-primary pull-right" type="button">
                    <i class="fa fa-download"></i><?= Yii::t("formulario", "Generate PDF") ?> 
                </button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t("Accion", "Close") ?></button>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal solicitud  -->

<!-- INICIO LI -->
<?php
echo Lightbox::widget([
    'files' => [
        [
        //'thumb' => 'url/to/thumb.ext',
        //'original' => 'url/to/original.ext',
        //'title' => 'optional title',
        ],
    ]
]);
//Inicia valores de Control
FileInput::widget([
    'name' => 'file',
        //'id' => 'txt_data',                
]);
?>


