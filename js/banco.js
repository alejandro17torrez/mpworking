$(document).on("ready", function(){
    listarb();
});

$("#addBank").on('click', function(){
    $("#addbank").modal('show');
});

var listarb = function() {
    var table = $("#dt_bank").DataTable({
        "destroy": true,
        "ajax":{
            "method":"POST",
            "url":"../controllers/bancoController.php"
        },
        "columns":[
            {"data":"cuenta"},
			{"data":"banco"},
			{"data":"tmoneda"},
            {"data":"tipo"},
            {"data":"nombre_cooperativa"},
            {"defaultContent": "<button type='button' class='editarB btn btn-primary' data-toggle='modal' data-target='#BankEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarB btn btn-danger' data-toggle='modal' data-target='#BankEliminar' ><i class='fa fa-trash-o'></i></button>"}
        ],
        "language": idioma_espanol
    });
   obtener_data_editar("#dt_bank tbody", table);
   obtener_id_eliminar("#dt_bank tbody", table);

}

var obtener_data_editar = function (tbody, table) {
    $(tbody).on("click", "button.editarB", function () {
       var data = table.row($(this).parents("tr")).data();
	   	 idbancoe = $("#idbancoe").val(data.id);
		 cbancoe = $("#cbancoe").val(data.cuenta);
         nbancoe = $("#nbancoe").val(data.banco);          
    });
            
}

var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminarB", function () {
       var data = table.row($(this).parents("tr")).data();
       idbankDel = $("#idbankDel").val(data.id);
    });
}




var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
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

function agregarBanco()
{ 
	var nbanco = document.frmAddBank.nbanco.value;
	var cbanco = document.frmAddBank.cbanco.value;
	var ccoop = document.frmAddBank.ccoop.value;
	var tc = document.frmAddBank.tc.value;
	var tm = document.frmAddBank.tm.value;
	var agregar = "agregar";
	if (nbanco == "" || cbanco == "" || ccoop == "" || tc == "" || tm == "") {
		if (nbanco == "") {
			alert("faltó el campo: nombre del banco afiliado");
		}
		if (cbanco == "") {
			alert("faltó el campo: número de cuenta de la cooperativa");
		}

		if (ccoop == "") {
			alert("faltó el campo: cooperativa afiliada");
		}
		if (tc == "") {
			alert("faltó el campo: tipo de cuenta");
		}
		if (tm == "") {
			alert("faltó el campo: tipo de moneda");
		}

	}
	else{
		alert("Datos: "+nbanco+" , "+cbanco+" , "+ccoop+", "+tc+" , "+tm+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/bancoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("nb="+nbanco+"&cb="+cbanco+"&cc="+ccoop+"&tc="+tc+"&tm="+tm+"&add="+agregar);
	}

}

function editarBanco()
{
	var id = document.frmEditBank.idbancoe.value;
	var nbanco = document.frmEditBank.nbancoe.value;
	var cbanco = document.frmEditBank.cbancoe.value;
	var ccoop = document.frmEditBank.ccoope.value;
	var tc = document.frmEditBank.tce.value;
	var tm = document.frmEditBank.tme.value;
	if (nbanco == "" || cbanco == "" || ccoop == "" || tc == "" || tm == "") {
		if (nbanco == "") {
			alert("faltó el campo: nombre del banco afiliado");
		}
		if (cbanco == "") {
			alert("faltó el campo: número de cuenta de la cooperativa");
		}

		if (ccoop == "") {
			alert("faltó el campo: cooperativa afiliada");
		}
		if (tc == "") {
			alert("faltó el campo: tipo de cuenta");
		}
		if (tm == "") {
			alert("faltó el campo: tipo de moneda");
		}

	}	
	else
	{
		alert("Datos: "+nbanco+" , "+cbanco+" , "+ccoop+", "+tc+" , "+tm+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/bancoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				alert('Cuenta actualizada exitosamente');
				listarb();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id="+id+"&nb="+nbanco+"&cb="+cbanco+"&cc="+ccoop+"&tc="+tc+"&tm="+tm);
	}


}

function eliminarBanco()
{
	var id = document.frmEliminarBank.idbankDel.value; 
	alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/bancoController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			alert('Cuenta eliminar exitosamente');
			listarb();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}
