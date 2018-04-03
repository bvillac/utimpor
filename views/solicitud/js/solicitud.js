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
    strFila += '<td style="display:none; border:none;">' + Grid[c]['pro_id'] + '</td>';
    strFila += '<td>' + Grid[c]['pro_nombre'] + '</td>';
    strFila += '<td>' + Grid[c]['pro_porcentaje_value'] + '</td>';
    //strFila +='<td>'+ Grid[c]['pro_foto']+'</td>';
    strFila += '<td>';
    //Cuando hay Actualizacion de Datos
    if(AccionTipo=="Update"){
        var imgFoto=(Grid[c]['accion']=='edit')?Grid[c]['pro_foto']:limpiarFake($('#txth_producto_foto').val());
        strFila += (Grid[c]['pro_foto'] != "") ? '<a data-title="'+ Grid[c]['pro_nombre'] +'" data-lightbox="image-'+Math.floor((Math.random() * 10) + 1)+'" href="' + $('#txth_imgfolder').val() + $('#txt_ftem_cedula').val()+'_'+$('#txth_ftem_id').val() + '/productos/' + imgFoto + '">Ver Foto</a>' : '<span class="label label-danger">No Tiene Foto</span>';
    }else{
        strFila += (Grid[c]['pro_foto'] != "") ? '<a data-title="'+ Grid[c]['pro_nombre'] +'" data-lightbox="image-'+Math.floor((Math.random() * 10) + 1)+'" href="' + $('#txth_imgfolder').val() + $('#txt_ftem_cedula').val() + '/productos/' + limpiarFake($('#txth_producto_foto').val()) + '">Ver Foto</a>' : '<span class="label label-danger">No Tiene Foto</span>';
    }
    strFila += '</td>';
    //strFila +='<td>'+ Grid[c]['pro_detalle_uso']+'</td>';
    strFila += '<td>';//¿Está seguro de eliminar este elemento?
    //strFila +='<a class="btn-img" onclick="eliminarItemsProducto('+Grid[c]['DEP_ID']+',\''+TbGtable+'\')" >'+imgCol+'</a>';
    strFila += '<a onclick="eliminarItemsProducto(\'' + Grid[c]['pro_id'] + '\',\'' + TbGtable + '\')" ><span class="glyphicon glyphicon-trash"></span></a>';
    strFila += '</td>';

    if (op) {
        strFila = '<tr>' + strFila + '</tr>';
    }
    return strFila;
}

// Recarga la Grid de Productos si Existe
function recargarGridProducto() {
    var tGrid = 'TbG_Productos';
    if (sessionStorage.dts_Producto) {
        var arr_Grid = JSON.parse(sessionStorage.dts_Producto);
        if (arr_Grid.length > 0) {
            $('#' + tGrid + ' > tbody').html("");
            for (var i = 0; i < arr_Grid.length; i++) {
                $('#' + tGrid + ' > tbody:last-child').append(retornaFilaProducto(i, arr_Grid, tGrid, true));
            }
        }
    }
}

function eliminarItemsProducto(val, TbGtable) {
    var ids = "";
    //var count=0;
    if (sessionStorage.dts_Producto) {
        var Grid = JSON.parse(sessionStorage.dts_Producto);
        if (Grid.length > 0) {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                if (ids == val) {
                    var array = findAndRemove(Grid, 'pro_id', ids);
                    sessionStorage.dts_Producto = JSON.stringify(array);
                    //if (count==0){sessionStorage.removeItem('detalleGrid')}
                    $(this).remove();
                }
            });
        }
    }
}


function agregarItemsBanco(opAccion) {
    var tGrid = 'TbG_Productos';
    var nombre = $('#txt_prod_nombre').val();
    //Verifica que tenga nombre producto y tenga foto
    if ($('#txt_prod_nombre').val() != "" && $('#txth_producto_foto').val() != "") {
        var valor = $('#txt_prod_nombre').val();
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            if (sessionStorage.dts_Producto) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_Producto);
                var size = arr_Grid.length;
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'pro_nombre', sessionStorage.dts_Producto)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        arr_Grid[size] = objProducto(size); //objAntDep(retornarIndexArray(JSON.parse(sessionStorage.atc_antDeporte),'DEP_NOMBRE',valor),JSON.parse(sessionStorage.atc_antDeporte));
                        sessionStorage.dts_Producto = JSON.stringify(arr_Grid);
                        addVariosItemProducto(tGrid, arr_Grid, -1);
                        limpiarDetalle();
                    } else {
                        menssajeModal("OK", "error", "Item ya existe en su lista", "Información", "", "", "1");
                    }
                } else {
                    /*Agrego a la Sesion*/
                    //Primer Items
                    //arr_Grid[0] = objAntDep(retornarIndexArray(JSON.parse(sessionStorage.atc_antDeporte),'DEP_NOMBRE',valor),JSON.parse(sessionStorage.atc_antDeporte));
                    arr_Grid[0] = objProducto(0);
                    sessionStorage.dts_Producto = JSON.stringify(arr_Grid);
                    addPrimerItemProducto(tGrid, arr_Grid, 0);
                    limpiarDetalle();
                }
            } else {
                //No existe la Session
                //Primer Items
                //arr_Grid[0] = objAntDep(retornarIndexArray(JSON.parse(sessionStorage.dts_Producto),'pro_nombre',valor),JSON.parse(sessionStorage.dts_Producto));
                arr_Grid[0] = objProducto(0);
                sessionStorage.dts_Producto = JSON.stringify(arr_Grid);
                addPrimerItemProducto(tGrid, arr_Grid, 0);
                limpiarDetalle();
            }
        } else {
            //data edicion
        }
    } else {
        menssajeModal("NO_OK", "Error", "No Existe datos de Producto Y/o Imagen", "Información", "", "", "1");
    }
}

function limpiarDetalle() {
    $('#txt_prod_nombre').val("");
    $('#txt_detalle_uso').val("");
    $("#cmb_por_id option[value=3]").attr("selected", true);
    $('#chk_envase').prop('checked', false);
    $('#chk_empaque').prop('checked', false);
    $('#chk_etiqueta').prop('checked', false);
    $('#chk_publicidad').prop('checked', false);
    $('#chk_otros').prop('checked', false);
    //Quita los Alertas
    removeIco('#txt_prod_nombre');
    removeIco('#txt_detalle_uso');
    //$('#txt_producto_foto').fileinput('upload');
    $('#txth_producto_foto').val("");
    $('#txt_producto_foto').val("");
    $('#txt_producto_foto').fileinput('enable');
    $('#txt_producto_foto').fileinput('refresh');
}

function objProducto(indice) {
    var rowGrid = new Object();
    rowGrid.pro_id = indice;
    rowGrid.pro_ftem_id = 0;
    rowGrid.pro_nombre = $('#txt_prod_nombre').val();
    rowGrid.pro_porcentaje = $('#cmb_por_id option:selected').val();
    rowGrid.pro_porcentaje_value = $('#cmb_por_id option:selected').text();
    rowGrid.pro_foto = limpiarFake($('#txth_producto_foto').val());
    rowGrid.pro_detalle_uso = $('#txt_detalle_uso').val();
    rowGrid.pro_envase = ($("#chk_envase").prop("checked")) ? 1 : 0;
    rowGrid.pro_empaque = ($("#chk_empaque").prop("checked")) ? 1 : 0;
    rowGrid.pro_etiqueta = ($("#chk_etiqueta").prop("checked")) ? 1 : 0;
    rowGrid.pro_publicidad = ($("#chk_publicidad").prop("checked")) ? 1 : 0;
    rowGrid.pro_otros = ($("#chk_otros").prop("checked")) ? 1 : 0;
    rowGrid.accion = "new";
    return rowGrid;
}


/* FIN INFORMACION DE BANCOS REFERENCIA*/

