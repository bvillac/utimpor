<?php
//https://getbootstrap.com/docs/4.0/examples/
use yii\helpers\Url;
//use app\models\Rol;
use yii\helpers\Html;

$this->title = 'Solicitud de Credito';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">             
                <a href="#paso1" data-toggle="tab" aria-expanded="true"><?= Yii::t("perfil", "Información General") ?></a>
            </li>
            <li class=""><a href="#paso2" data-toggle="tab" aria-expanded="false"><?= Yii::t("perfil", "Referencia") ?></a></li>
            <li class=""><a href="#paso3" data-toggle="tab" aria-expanded="false"><?= Yii::t("perfil", "Patrimonios") ?></a></li>
            <li class=""><a href="#paso4" data-toggle="tab" aria-expanded="false"><?= Yii::t("perfil", "Observacines") ?></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="paso1">
                <form class="form-horizontal">
                    <?=
                    $this->render('_form_tab1', [
                        'cantones' => $cantones,
                        'genero' => $genero, 
                        'estCivil' => $estCivil,
                        'provincias' => $provincias
                        ]);
                    ?>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="paso2">
                <form class="form-horizontal">
                    <?= 
                    $this->render('_form_tab2', 
                        [//'provincias' => $provincias,
                        
                         //'objetivos' => $objetivos
                            ]); ?>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="paso3">
                <form class="form-horizontal">
                    <?= 
                    $this->render('_form_tab3', 
                        [//'provincias' => $provincias,
                        
                         //'objetivos' => $objetivos
                            ]); ?>
                </form>
            </div><!-- /.tab-pane -->
           
            <div class="tab-pane" id="paso4">
                <form class="form-horizontal">
                    <?= 
                    $this->render('_form_tab4', 
                        [//'provincias' => $provincias,
                        
                         //'objetivos' => $objetivos
                            ]); ?>
                </form>
            </div><!-- /.tab-pane -->
            
        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.col -->
<div class="col-md-2">
    <p><?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t("accion", "Save"), 'javascript:', ['id' => 'btn_saveCreate','class' => 'btn btn-primary btn-block']); ?> </p>
</div>

<script>
    var AccionTipo='Create';
</script>



