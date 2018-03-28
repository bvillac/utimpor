<?php
/* @var $this yii\web\View */
//$this->title = 'My Yii Application';
use yii\helpers\Html;
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Felicitaciones!</h1>

        <p class="lead">Nos ocupamos de llegar con Nuestros Suministros a toda la ciudad de Guayaquil.</p>

        <h2>Utimpor S.A.</h2>
            <p>Somos la mayor empresa de productos de oficina, lo que hace que seamos los mejores es nuestro espíritu de servicio. Durante 21 años nos hemos dedicado a suministrar productos y servicios para la oficina que han ayudado a que nuestros clientes tengan éxito en sus respectivos negocios. </p>
            
            <img src="<?= Html::encode($directoryAsset . "/img/logos/logov_".Yii::$app->language.".png") ?>" alt="logo" />
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                
            </div>
        </div>

    </div>
</div>
