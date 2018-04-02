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
    <h3><?= Yii::t("formulario", "Observación") ?></h3>
</div>

<div class="col-md-6">
    <div class="form-group">
<!--        <label>Observación</label>-->
        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
    </div>
</div>


<div class="row"></div>