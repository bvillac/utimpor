<?php

use yii\helpers\Url;
use app\models\Rol;
use yii\helpers\Html;
?>
<?= Html::hiddenInput('txth_ftem_id', 0,['id' =>'txth_ftem_id']); ?>
<?= Html::hiddenInput('txth_errorFile', Yii::t("formulario", "The file extension is not valid or exceeds the maximum size in MB recommending him try again") ,['id' =>'txth_errorFile']); ?>
<?php if(Yii::$app->params["adminRegister"] && (Yii::$app->session->get('PB_iduser', FALSE) == 1)): ?>
<div class="col-md-12 form-group">
    <div><h3>&nbsp;&nbsp;Datos del Usuario</h3></div> 
</div>
<div class="col-md-12 form-group">
    <div class="form-group">
        <label for="txt_ftem_usernamen" class="col-sm-2 control-label"><?= Yii::t("perfil", "First Name") ?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_usernamen" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "First Name") ?>">
        </div>
    </div>
</div>
<div class="col-md-12 form-group">
    <div class="form-group">
        <label for="txt_ftem_userlastn" class="col-sm-2 control-label"><?= Yii::t('perfil', 'Last Name') ?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_ftem_userlastn" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t('perfil', 'Last Name') ?>">
        </div>
    </div>
</div>
<div class="col-md-12 form-group">
    <div class="form-group">
        <label for="txt_ftem_useremailn" class="col-sm-2 control-label"><?= Yii::t('login', 'Email') ?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control PBvalidation" id="txt_ftem_useremailn" data-type="email" data-keydown="true" placeholder="<?= Yii::t('login', 'Email') ?>">
        </div>
    </div>
</div>
<br /><br />
<?php endif; ?>
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">             
                <a href="#paso1" data-toggle="tab" aria-expanded="true">
                    <img class="" src="<?= Url::home() ?>img/users/n1.png" alt="User Image">
                    <?= Yii::t("formulario", "Registro") ?>
                </a>
            </li>
            <li class=""><a href="#paso2" data-toggle="tab" aria-expanded="false"><img class="" src="<?= Url::home() ?>img/users/n2.png" alt="User Image"><?= Yii::t("formulario", "Objetivo") ?></a></li>
            <li class=""><a href="#paso3" data-toggle="tab" aria-expanded="false"><img class="" src="<?= Url::home() ?>img/users/n3.png" alt="User Image"><?= Yii::t("formulario", "Uso") ?></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="paso1">
                <form class="form-horizontal">
                    <?=
                    $this->render('_form_tab1', [
                        'cantones' => $cantones,
                        'tipopyme' => $tipopyme,
                        'origen' => $origen,
                        'genero' => $genero,
                        'etnica' => $etnica,
                        'personeria' => $personeria,
                        'provincias' => $provincias,
                        'industria' => $industria]);
                    ?>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="paso2">
                <form class="form-horizontal">
                    <?= 
                    $this->render('_form_tab2', 
                        ['provincias' => $provincias,
                         'pais' => $pais,
                         'trayectoria' => $trayectoria,
                         'subobjetivos' => $subobjetivos,
                        'objetivos' => $objetivos]); ?>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="paso3">
                <form class="form-horizontal">
                    <?= $this->render('_form_tab3', ['usomarca' => $usomarca,
                        'detProducto' => $detProducto,
                        'porcentaje' => $porcentaje]); ?>
                </form>
            </div><!-- /.tab-pane -->

        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.col -->
<script>
    var AccionTipo='Create';
</script>

