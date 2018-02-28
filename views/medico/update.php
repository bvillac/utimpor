<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Modificar Médico '; //. ' ' . $model[0]["med_id"];
//$this->params['breadcrumbs'][] = ['label' => 'Medicos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model[0]["med_id"], 'url' => ['view', 'id' => $model[0]["med_id"]]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<?= Html::hiddenInput('txth_med_id',$model[0]["med_id"],['id' =>'txth_med_id']); ?>
<?= Html::hiddenInput('txth_per_id',$model[0]["per_id"],['id' =>'txth_per_id']); ?>
<div class="medico-update">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">             
                <a href="#paso1" data-toggle="tab" aria-expanded="true"><?= Yii::t("perfil", "Personal data") ?></a>
            </li>
            <li class=""><a href="#paso2" data-toggle="tab" aria-expanded="false"><?= Yii::t("perfil", "Especialidad") ?></a></li>
<!--            <li class=""><a href="#paso3" data-toggle="tab" aria-expanded="false"><?= Yii::t("perfil", "Objetivo2") ?></a></li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="paso1">
                <form class="form-horizontal">
                    <?=
                    $this->render('_form_tab1', [
                        'cantones' => $cantones,
                        'genero' => $genero, 
                        'estCivil' => $estCivil,
                        'provincias' => $provincias]);
                    ?>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="paso2">
                <form class="form-horizontal">
                    <?= $this->render('_form_tab2', 
                        ['especialidades' => $especialidades,
                        'empresas' => $empresas]); ?>
                </form>
            </div><!-- /.tab-pane -->
            
        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.col -->
<div class="col-md-2">
    <p><?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t("accion", "Save"), 'javascript:', ['id' => 'btn_saveUpdate','class' => 'btn btn-primary btn-block']); ?> </p>
</div>

<script>
    //Datos de Solicitud
    //var varPerData=base64_decode('<?= $persona ?>');
    var AccionTipo='Update';
    var varPerData=<?= $persona ?>;
    var varMedData=<?= $medico ?>;
    var varEspData=<?= $medicoEsp ?>;
    var varEmpData=<?= $medicoEmp ?>;
    //alert(varPerData[0].Nombre);
</script>

