<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use app\assets\WebRtcAsset;

//namespace app\commands;
//use consik\yii2websocket\WebSocketServer;
//use yii\console\Controller;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Video Conferencìa';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="paciente-index">
    <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
</div>-->
<div class="col-md-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">
                <?= Html::a('<span class="fa fa-fw fa-paper-plane"></span> ' . Yii::t("accion", "Enviar Solicitud"), 'javascript:', ['id' => 'btn_send', 'class' => 'btn btn-primary btn-block']); ?>
            </h3>    
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <!--<video id="gum-local" autoplay></video>-->

                <video id="localVideo" autoplay></video>
                <video id="remoteVideo" autoplay></video>

                <div>
                    <button id="startButton">Start</button>
                    <button id="callButton">Call</button>
                    <button id="hangupButton">Hang Up</button>
                </div>

                <div id="errorMsg"></div>
                
                
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <?= Html::textInput('name', null, [
                                'id' => 'txt_name',
                                'class' => 'form-control',
                                'placeholder' => 'Nombre'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="form-group">
                            <?= Html::textInput('message', null, [
                                'id' => 'txt_message',
                                'class' => 'form-control',
                                'placeholder' => 'Message'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <p><?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t("accion", "Save"), 'javascript:', ['id' => 'btn_sendmessage','class' => 'btn btn-primary btn-block']); ?> </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="notifications" ></div>
                </div>



            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="col-md-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">
                <?= Html::a('<span class="fa fa-fw fa-paper-plane"></span> ' . Yii::t("accion", "Enviar Solicitud"), 'javascript:', ['id' => 'btn_send', 'class' => 'btn btn-primary btn-block']); ?>
            </h3>    
        </div>
        <div class="box-body">
            <div class="col-md-12">

                <section>
                    <form id="fileInfo">
                        <input type="file" id="fileInput" name="files"/>
                    </form>

                    <div class="progress">
                        <div class="label">Send progress: </div>
                        <progress id="sendProgress" max="0" value="0"></progress>
                    </div>

                    <div class="progress">
                        <div class="label">Receive progress: </div>
                        <progress id="receiveProgress" max="0" value="0"></progress>
                    </div>

                    <div id="bitrate"></div>
                    <a id="download"></a>
                    <span id="status"></span>

                </section>

            </div>
            
            <div class="col-md-12">
                <section>
                    <div id="messgeFile"></div>
<!--                    <form id="fileInfo">-->
                    <input type="file" id="fileImage" name="fileImage"/>
<!--                    </form>-->
                    <div class="form-group">
                            <?= Html::textInput('message', null, [
                                'id' => 'txt_messageFile',
                                'class' => 'form-control',
                                'placeholder' => 'Message'
                            ]) ?>
                        </div>

                    <div class="col-xs-2">
                        <div class="form-group">
                            <p><?= Html::a('<span class="glyphicon glyphicon-floppy-send"></span> ' . Yii::t("accion", "Send"), 'javascript:', ['id' => 'btn_sendFile','class' => 'btn btn-primary btn-block']); ?> </p>
                        </div>
                    </div>

                    

                </section>
            </div>
            
            <div class="col-md-12">
                <section class="experiment">
                    <div class="make-center">
                        <input type="text" id="room-id" value="abcdef">
                        <button id="open-room">Open Room</button>
                        <button id="join-room">Join Room</button>
                        <button id="open-or-join-room">Auto Open Or Join Room</button>

                        <br><br>
                        <input type="text" id="input-text-chat" placeholder="Enter Text Chat" disabled>
                        <button id="share-file" disabled>Share File</button>
                        <br><br>
                        <button id="btn-leave-room" disabled>Leave /or close the room</button>

                        <div id="room-urls" style="text-align: center;display: none;background: #F1EDED;margin: 15px -10px;border: 1px solid rgb(189, 189, 189);border-left: 0;border-right: 0;"></div>
                    </div>

                    <div id="chat-container">
                        <div id="file-container"></div>
                        <div class="chat-output"></div>
                    </div>

                    <div id="videos-container"></div>
                </section>
                
            </div>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>
<script>
    var AccionTipo = '';
</script>


