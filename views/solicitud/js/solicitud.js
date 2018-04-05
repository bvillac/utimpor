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

$(document).ready(function () {
     /*DATOS DE TABLA BANCO*/
    $('#add_Producto').click(function () {
        agregarItemsBanco('new');
    });
    
    
});

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
                alert(ids);
                if (ids == val) {
                    var array = findAndRemove(Grid, 'ids_rep', ids);
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
    //$('#txt_detalle_uso').val("");
    $("#cmb_banco option[value=0]").attr("selected", true);
//    $('#chk_envase').prop('checked', false);
//    $('#chk_empaque').prop('checked', false);
//    $('#chk_etiqueta').prop('checked', false);
//    $('#chk_publicidad').prop('checked', false);
//    $('#chk_otros').prop('checked', false);
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
    rowGrid.cre_ban ='P'; 
    //rowGrid.pro_envase = ($("#rbt_op1").prop("checked")) ? 1 : 0;
    rowGrid.accion = "new";
    return rowGrid;
}


/* FIN INFORMACION DE BANCOS REFERENCIA*/

