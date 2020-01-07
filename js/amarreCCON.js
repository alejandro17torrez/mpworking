$(document).on("ready", function () {
	listarc();
});

$("#addDcc").on('click', function () {
	$("#cdAddCCps").modal('show');
});

var listarc = function () {
	var table = $("#dt_cps").DataTable({
		"destroy": true,
		"ajax": {
			"method": "POST",
			"url": "../controllers/amarreCCcontroller.php"
		},
		"columns": [
			{
				"data": "nombre_cooperativa"
			},
			{
				"data": "codigo"
			},
			{
				"data": "cuenta"
			},
			{
				"data": "concepto"
			},
			{
				"data": "signo"
			},
			{
				"defaultContent": "<button type='button' class='editarCps btn btn-primary' data-toggle='modal' data-target='#cpsEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarCps btn btn-danger' data-toggle='modal' data-target='#cpsEliminar' ><i class='fa fa-trash-o'></i></button>"
			}
		],
		"language": idioma_espanol
	});
	obtener_data_editar("#dt_cps tbody", table);
	obtener_id_eliminar("#dt_cps tbody", table);

}

var obtener_data_editar = function (tbody, table) {
	$(tbody).on("click", "button.editarCps", function () {
		var data = table.row($(this).parents("tr")).data();
		idcuenta = $("#idcps").val(data.id);
		ccuenta = $("#codcpsxs").val(data.concepto);
	});

}

var obtener_id_eliminar = function (tbody, table) {
	$(tbody).on("click", "button.eliminarCps", function () {
		var data = table.row($(this).parents("tr")).data();
		idcuenta = $("#idCpsDel").val(data.id);
	});
}




var idioma_espanol = {
	"sProcessing": "Procesando...",
	"sLengthMenu": "Mostrar _MENU_ registros",
	"sZeroRecords": "No se encontraron resultados",
	"sEmptyTable": "Ningún dato disponible en esta tabla =(",
	"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix": "",
	"sSearch": "Buscar:",
	"sUrl": "",
	"sInfoThousands": ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst": "Primero",
		"sLast": "Último",
		"sNext": "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	},
	"buttons": {
		"copy": "Copiar",
		"colvis": "Visibilidad"
	}
}

function AJAXObject() {
	var xmlhttp = false;
	try {
		xmlhttp = new ActiveXObject("Msxm12.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function agregarCps() {
	var desccps = document.frmAddCps.desccps.value;
	var agregar = "agregar";

	if (desccps == "") 
	{
		alert("Le falta el campo, descripción de coneptos.");
		
	}
	else
	{
		alert("Datos: " + desccps + " , " + agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/conceptosController.php", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("dc=" + desccps + "&add=" + agregar);	
	}
}

function editarCps() {
	var id = document.frmEditCc.idcps.value;
	var signocc = document.frmEditCc.signocc.value;
	var conceptocc = document.frmEditCc.conceptocc.value;
	
	
		alert("Datos: " + signocc + " , " +conceptocc+ " , " + id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/detallesConceptosController.php", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				//alert('Cuenta actualizada exitosamente');
				listarc();
			}
		} 
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("idx=" + id + "&conceptocc=" + conceptocc + "&signo=" + signocc);
	
}

function eliminarCps() {
	var id = document.frmEliminarCps.idCpsDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/detallesConceptosController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("iddx=" + id);

}

function asignarvalor(input, select)
{
	var lista = document.getElementById(select);
	var opcion = lista.options[lista.selectedIndex].textContent;
	var variable = document.getElementById(input); 
	variable.value = opcion;
}