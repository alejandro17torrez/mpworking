$(document).on("ready", function(){
    listar();

});

$("#addCoop").on("click", function () {
    $("#cooperativasAgregar").modal('show');
})


var listar = function() {
    var table = $("#dt_cooperativa").DataTable({
        "destroy": true,    
        "ajax":{
            "method":"POST",
            "url":"../controllers/cooperativasController.php"
        },
        "columns":[
            {"data":"nombre_cooperativa"},
            {"data":"resolucion_cooperativa"},
            {"data":"numero_ruc"},
            {"data":"usuario"},
            {"data":"password"},
            {"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#cooperativasEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#cooperativasEliminar' ><i class='fa fa-trash-o'></i></button>"}
        ],
        "language": idioma_espanol
    });

    obtener_data_editar("#dt_cooperativa tbody", table);
    obtener_id_eliminar("#dt_cooperativa tbody", table);



}

var obtener_data_editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
       var data = table.row($(this).parents("tr")).data();
       var idcoop = $("#idcope").val(data.id);
       var iduser = $("#iduser").val(data.idus);
       var  nombreCoop = $("#nce").val(data.nombre_cooperativa);
       var  resolucionCoop = $("#rce").val(data.resolucion_cooperativa); 
       var  rucCoop = $("#rco").val(data.numero_ruc);
       var  user = $("#une").val(data.usuario);
       var  pass = $("#passe").val(data.password);
    });            
}




var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
       var data = table.row($(this).parents("tr")).data();
       var idcoop = $("#idCoopDel").val(data.id);
    });
}

var idioma_espanol = {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}

function AJAXObject()
{
	var xmlhttp = false;
	try 
	{
		xmlhttp = new ActiveXObject("Msxm12.XMLHTTP");
	} 
	catch (e) 
	{
		try 
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} 
		catch (E) 
		{
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


function agregarCooperativas()
{
    agregarCooperativa();
    agregarUsuario();
}


function agregarCooperativa()
{
        var nombreCooperativa = document.frmAddCoop.nc.value;
        var resolucionCooperativa = document.frmAddCoop.rc.value;
        var numeroRUC = document.frmAddCoop.nr.value;
        var un = document.frmAddCoop.un.value;
        var pass = document.frmAddCoop.pass.value;
    
        var agregar = "agregar";

        if (nombreCooperativa == "" || resolucionCooperativa == "" || numeroRUC == "" || un == "" || pass == "") 
        {
            if (nombreCooperativa == "") 
            {
                alert("falta este campo, nombre cooperativa");
            }
            if (resolucionCooperativa == "") 
            {
                alert("falta este campo, resolución cooperativa");
            }
            if (numeroRUC == "") 
            {
                alert("falta este cmapo, número RUC cooperativa");
            }
            if (un == "") 
            {
                alert("falta este campo, username");
            }
            if (pass == "") 
            {
                alert("falta este campo, password");
            }     
        }
        else 
        {
            //alert("Datos: "+nombreCooperativa+" , "+resolucionCooperativa+" , "+numeroRUC+" , "+un+" , "+pass+" , "+agregar);
            ajax = AJAXObject();
            ajax.open("POST", "../controllers/cooperativasController.php", true);
            ajax.onreadystatechange=function()
            {
                if (ajax.readyState==4)
                {
                    //alert('Cooperativa agregada exitosamente');
                    
                    window.location.reload(true);
                }
            }
            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            ajax.send("nc="+nombreCooperativa+"&rc="+resolucionCooperativa+"&nr="+numeroRUC+"&un="+un+"&pass="+pass+"&add="+agregar);
    
        }  
}


function editarCooperativas()
{
    var id = document.frmEditCoop.idCooperativa.value;
    var idus = document.frmEditCoop.iduser.value;
	var nombreCooperativa = document.frmEditCoop.nombreCooperativa.value;
	var resolucionCooperativa = document.frmEditCoop.resolucionCooperativa.value;
    var numeroRUC = document.frmEditCoop.numeroRUC.value;
    var une = document.frmEditCoop.une.value;
    var passe = document.frmEditCoop.passe.value;

    if (nombreCooperativa == "" || resolucionCooperativa == "" || numeroRUC == ""|| une == "" || passe == "") 
        {
            if (nombreCooperativa == "") 
            {
                alert("falta este campo, nombre cooperativa");
            }
            if (resolucionCooperativa == "") 
            {
                alert("falta este campo, resolución cooperativa");
            }
            if (numeroRUC == "") 
            {
                alert("falta este cmapo, número RUC cooperativa");
            }
            if (une == "") 
            {
                alert("falta este cmapo, número RUC cooperativa");
            }
            if (passe == "") 
            {
                alert("falta este cmapo, número RUC cooperativa");
            }    
        }
        else
        {
           // alert("Datos: "+nombreCooperativa+" , "+resolucionCooperativa+" , "+numeroRUC+" , "+passe+" , "+une+" , "+id+" , "+idus);
            ajax = AJAXObject();
            ajax.open("POST", "../controllers/cooperativasController.php", true);
            ajax.onreadystatechange=function()
            {
                if (ajax.readyState==4)
                {
                    //alert('Cooperativa actualizada exitosamente');
                    listar();
                }
            }
            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            ajax.send("id="+id+"&iduser="+idus+"&nc="+nombreCooperativa+"&rc="+resolucionCooperativa+"&nr="+numeroRUC+"&un="+une+"&pass="+passe);
        
        }
}

function eliminarCooperativas()
{
	var id = document.frmEliminarCoop.idCooperativa.value;
	
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/cooperativasController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cooperativa actualizada exitosamente');
			listar();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}


