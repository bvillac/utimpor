/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function retornarIndexArray(array, property, value) {
    var index = -1;
    for (var i = 0; i < array.length; i++) {
        //alert(array[i][property]+'-'+value)
        if (array[i][property] == value) {
            index = i;
            return index;
        }
    }
    return index;
}

function codigoExiste(value, property, lista) {
    if (lista) {
        var array = JSON.parse(lista);
        for (var i = 0; i < array.length; i++) {
            if (array[i][property] == value) {
                return false;
            }
        }
    }
    return true;
}

function findAndRemove(array, property, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][property] == value) {
            array.splice(i, 1);
        }
    }
    return array;
}


function obtenerCanton() {
    var link = $('#txth_base').val() + "/solicitud/create";
    var arrParams = new Object();
    arrParams.prov_id = $('#cmb_provincia').val();
    arrParams.getcantones = true;
    requestHttpAjax(link, arrParams, function (response) {
        if (response.status == "OK") {
            data = response.message;
            setComboData(data.cantones, "cmb_ciudad");
        }
    }, true);
}

function controlDni(valor){
    if(valor=="C"){
        //Valida control DNI Local
        $('#txt_ced_ruc').attr("data-type", "cedula");
        $('#txt_ced_ruc').attr("maxlength", 10);
        $('#txt_ced_ruc').attr("placeholder", "Documento Nacional de Identidad");
        
    }else if (valor=="R") {
        //Valida control DNI Local
        $('#txt_ced_ruc').attr("data-type", "ruc");
        $('#txt_ced_ruc').attr("maxlength", 13);
        $('#txt_ced_ruc').attr("placeholder", "Registro Único de Contribuyente");
    }else{
        //valida control DNI extrangero
        $('#txt_ced_ruc').attr("data-type", "all");
        $('#txt_ced_ruc').attr("maxlength", 15);
        $('#txt_ced_ruc').attr("placeholder", "Documento Extranjero de Identidad");
    }

}


$(document).ready(function () {
     InicioFormulario();//Inicia Datos de Formulario
     
    $('#cmb_provincia').change(function () {
        obtenerCanton();
    });
    
    $('#cmb_cod_i_r').change(function () {
        controlDni($('#cmb_cod_i_r').val());
    });
     
     /*DATOS DE TABLA BANCO*/
    $('#add_Producto').click(function () {
        agregarItemsBanco('new');
    });
    
    $('#cmb_tip_sol').change(function () {
        //Tipo Solicitud
        tipoSolicitud();
    });
    
    
});

function loadDataCreate() {
    //iniciarUpload();
    //disableSolicitudPart1(true);
    //disableSolicitudPart2(true);
    //disableSolicitudPart3(true);

}

function InicioFormulario() { 
    if (AccionTipo == "Update") {
        loadDataUpdate();
    } else if (AccionTipo == "Create") {
        loadDataCreate();
    }
}

/* INFORMACION DE BANCOS REFERENCIA*/


function addPrimerItemProducto(TbGtable, lista, i) {
    /*Remuevo la Primera fila*/
    $('#' + TbGtable + ' >table >tbody').html("");
    /*Agrego a la Tabla de Detalle*/
    $('#' + TbGtable + ' tr:last').after(retornaFilaProducto(i, lista, TbGtable, true));
}

function addVariosItemProducto(TbGtable, lista, i) {
    //i=(i==-1)?($('#'+TbGtable+' tr').length)-1:i;
    i = ($('#' + TbGtable + ' tr').length) - 1;
    //$('#'+TbGtable+' >table >tbody').append(retornaFilaProducto(i,lista,TbGtable,true));
    $('#' + TbGtable + ' tr:last').after(retornaFilaProducto(i, lista, TbGtable, true));
}

function retornaFilaProducto(c, Grid, TbGtable, op) {
    //var RutaImagenAccion='ruta IMG'//$('#txth_rutaImg').val();
    var strFila = "";
    //var imgCol='<img class="btn-img" src="'+RutaImagenAccion+'/acciones/eliminar.png" >';
    strFila += '<td style="display:none; border:none;">' + Grid[c]['ids_reb'] + '</td>';
    strFila += '<td>' + Grid[c]['nom_ban'] + '</td>';
    strFila += '<td>' + Grid[c]['tip_cta'] + '</td>';
    strFila += '<td>' + Grid[c]['num_cta'] + '</td>';
    strFila += '<td>' + Grid[c]['cre_ban'] + '</td>';
    
    //strFila +='<td>'+ Grid[c]['pro_detalle_uso']+'</td>';
    strFila += '<td>';//¿Está seguro de eliminar este elemento?
    //strFila +='<a class="btn-img" onclick="eliminarItemsProducto('+Grid[c]['DEP_ID']+',\''+TbGtable+'\')" >'+imgCol+'</a>';
    strFila += '<a onclick="eliminarItemsBanco(\'' + Grid[c]['ids_reb'] + '\',\'' + TbGtable + '\')" ><span class="glyphicon glyphicon-trash"></span></a>';
    strFila += '</td>';

    if (op) {
        strFila = '<tr>' + strFila + '</tr>';
    }
    return strFila;
}

// Recarga la Grid de Productos si Existe
function recargarGridProducto() {
    var tGrid = 'TbG_Productos';
    if (sessionStorage.dts_refeBancos) {
        var arr_Grid = JSON.parse(sessionStorage.dts_refeBancos);
        if (arr_Grid.length > 0) {
            $('#' + tGrid + ' > tbody').html("");
            for (var i = 0; i < arr_Grid.length; i++) {
                $('#' + tGrid + ' > tbody:last-child').append(retornaFilaProducto(i, arr_Grid, tGrid, true));
            }
        }
    }
}

function eliminarItemsBanco(val, TbGtable) {
    var ids = "";
    //var count=0;
    if (sessionStorage.dts_refeBancos) {
        var Grid = JSON.parse(sessionStorage.dts_refeBancos);
        if (Grid.length > 0) {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                //alert(ids);
                if (ids == val) {
                    var array = findAndRemove(Grid, 'ids_reb', ids);
                    sessionStorage.dts_refeBancos = JSON.stringify(array);
                    //if (count==0){sessionStorage.removeItem('detalleGrid')}
                    $(this).remove();
                }
            });
        }
    }
}


function agregarItemsBanco(opAccion) {
    var tGrid = 'TbG_Productos';
    var nombre = $('#txt_num_cta').val();
    //Verifica que tenga nombre producto y tenga foto
    if ($('#txt_num_cta').val() != "" &&  $('#cmb_banco option:selected').val() != 0) {
        var valor = $('#txt_num_cta').val();
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            if (sessionStorage.dts_refeBancos) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_refeBancos);
                var size = arr_Grid.length;
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'pro_nombre', sessionStorage.dts_refeBancos)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        arr_Grid[size] = objProducto(size); //objAntDep(retornarIndexArray(JSON.parse(sessionStorage.atc_antDeporte),'DEP_NOMBRE',valor),JSON.parse(sessionStorage.atc_antDeporte));
                        sessionStorage.dts_refeBancos = JSON.stringify(arr_Grid);
                        addVariosItemProducto(tGrid, arr_Grid, -1);
                        limpiarDetalle();
                    } else {
                        menssajeModal("OK", "error", "Item ya existe en su lista", "Información", "", "", "1");
                    }
                } else {
                    /*Agrego a la Sesion*/
                    //Primer Items                   
                    sessionStorage.dts_refeBancos = JSON.stringify(arr_Grid);
                    addPrimerItemProducto(tGrid, arr_Grid, 0);
                    limpiarDetalle();
                }
            } else {
                //No existe la Session
                //Primer Items
                arr_Grid[0] = objProducto(0);
                sessionStorage.dts_refeBancos = JSON.stringify(arr_Grid);
                addPrimerItemProducto(tGrid, arr_Grid, 0);
                limpiarDetalle();
            }
        } else {
            //data edicion
        }
    } else {
        showAlert('NO_OK', 'error', {"wtmessage": 'Debe seleccionar Información Requerida', "title":'Información'});
    }
}

function limpiarDetalle() {
    $('#txt_num_cta').val("");
    $('#cmb_banco').val(0);
    $('#cmb_tip_cta').val(0);
    //$('#chk_envase').prop('checked', false);
    //Quita los Alertas
    removeIco('#txt_num_cta');
}

function objProducto(indice) {
    var rowGrid = new Object();
    rowGrid.ids_reb = indice;
    //rowGrid.ids_reb = 0;
    rowGrid.ids_ban =$('#cmb_banco option:selected').val();
    rowGrid.nom_ban =$('#cmb_banco option:selected').text();
    rowGrid.tip_cta =$('#cmb_tip_cta option:selected').val();
    rowGrid.nom_cta =$('#cmb_tip_cta option:selected').text();
    rowGrid.num_cta = $('#txt_num_cta').val();
    //rowGrid.cre_ban = ($("#rbt_op1").prop("checked")) ? 1 : 0;
    rowGrid.cre_ban = $("input[name='rbt_op']:checked").val();
    rowGrid.accion = "new";
    return rowGrid;
}


/* FIN INFORMACION DE BANCOS REFERENCIA*/


/* INICIO GUARDAR INFORMACION */
function guardarSolicitud(accion) {
    //if ($("#chk_aceptar").prop("checked")) {
        var ID = (accion == "Update") ? $('#txth_ids_sol').val() : 0;
        var link = $('#txth_base').val() + "/solicitud/save";
        var arrParams = new Object();
        
        arrParams.DATA = dataSolicitud(ID);
        //arrParams.DATA_3 = dataSolicitudPart3();
        if($('#txt_ftem_usernamen').val() != ""){
            var objDat4 = new Object();
            var darArr4 = new Array;
            objDat4.user_name = $('#txt_ftem_usernamen').val();
            objDat4.user_lastname = $('#txt_ftem_userlastn').val();
            objDat4.user_email = $('#txt_ftem_useremailn').val();
            darArr4[0] = objDat4;
            arrParams.DATA_4 = darArr4;
            sessionStorage.dataSolicitud_4 = JSON.stringify(darArr4);
        }

        arrParams.ACCION = accion;
        //Subir Imagenes

        var validation = validateForm();
        if (!validation) {
            //subirDocumentos(1, true);
            //subirDocumentos(2, true);
            requestHttpAjax(link, arrParams, function (response) {
                var message = response.message;
                if (response.status == "OK") {
                    //var data =response.data;
                    //$('#txth_ftem_id').val(data.ids);
                    //AccionTipo=data.accion;
                    menssajeModal(response.status, response.type, message.info, response.label, "", "", "1");
                    limpiarDatos();
                    var renderurl = $('#txth_base').val() + "/mceformulariotemp/index";
                    window.location = renderurl;
                }else{
                    menssajeModal(response.status, response.type, message.info, response.label, "", "", "1");
                }
            }, true);
        }
    //} else {
        //showAlert('NO_OK', 'error', {"wtmessage": 'Debe Aceptar los términos de la Declaración Jurada', "title":'Información'});
    //}
}


function dataSolicitud(ID) {
    var datArray = new Array();
    var objDat = new Object();    
    objDat.ids_sol = ID;//Genero Automatico
    
    objDat.cod_emp  ='99'
    objDat.cod_i_r  =$('#cmb_cod_i_r').val();
    objDat.ced_ruc  =$('#txt_ced_ruc').val();
    objDat.tip_con  =$('#cmb_tip_con').val();
    objDat.raz_soc  =$('#txt_raz_soc').val();
    objDat.tip_emp  =$('#cmb_tip_emp').val();
    objDat.ano_act  =$('#cmb_ano_act').val();
    objDat.cod_pai  ='56';//Ecuador
    objDat.cod_ciu  =$('#cmb_ciudad').val();
    objDat.dir_rpl  =$('#txt_dir_rpl').val();
    objDat.corre_e  =$('#txt_corre_e').val();
    objDat.act_com  =$('#cmb_act_com').val();
    objDat.tel_cel  =$('#txt_tel_cel').val();
    objDat.tel_n01  =$('#txt_tel_n01').val();
    objDat.idforma  =$('#cmb_idforma').val();
    objDat.cre_sol  =$('#txt_cre_sol').val();
    objDat.tip_viv  =$('#cmb_tip_viv').val();
    objDat.tim_viv  =$('#txt_tim_viv').val();
    objDat.nom_arr  =$('#txt_nom_arr').val();
    objDat.tel_arr  =$('#txt_tel_arr').val();
    objDat.tip_loc  =$('#cmb_tip_loc').val();
    objDat.tim_loc  =$('#txt_tim_loc').val();
    objDat.nom_arl  =$('#txt_nom_arl').val();
    objDat.tel_arl  =$('#txt_tel_arl').val();
    objDat.veh_mar  =$('#txt_veh_mar').val();
    objDat.veh_val  =$('#txt_veh_val').val();
    objDat.pre_hip  =$('#txt_pre_hip').val();
    objDat.cut_men  =$('#txt_cut_men').val();
    objDat.obs_gen  =$('#txt_obs_gen').val();
    objDat.est_log  ='1';

    datArray[0] = objDat;
    sessionStorage.dataSolicitud = JSON.stringify(datArray);
    //return JSON.stringify(datArray);
    return datArray;
}


function tipoSolicitud() {
    //$("#div_otrasMarca").html("");
    if ($('#cmb_tip_sol').val()=="D"){
        $('#div_Distribuidor').show();
        //$('#paso3').show();
        $('#txtab_paso3').show();
        $('#div_Final').hide();
    }else{
        $('#div_Final').show();
        $('#div_Distribuidor').hide();
        //$('#paso3').hide();
        $('#txtab_paso3').hide();
    } 
    
    
}

