$(document).on("ready", function () {
	listarc();
	listc();
});

$("#addDc").on('click', function () {
	$("#addcd").modal('show');
});

$("#modal").on('click', function () {
	$("#modalCon").modal('show');
});



var listarc = function () {
	var table = $("#dt_dc").DataTable({
		"destroy": true,
		"ajax": {
			"method": "POST",
			"url": "../controllers/detallesConceptosController.php"
		},
		"columns": [{
				"data": "nombre_cooperativa"
			},
			{
				"data": "codigo"
			},
			{
				"data": "cuenta"
			},
			{
				"data": "saldo"
			},
			{
				"defaultContent": "<button type='button' class='editarCps btn btn-primary' data-toggle='modal' data-target='#editccx'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarCps btn btn-danger' data-toggle='modal' data-target='#cdEliminar' ><i class='fa fa-trash-o'></i></button>  <button type='button' class='addCps btn btn-primary' data-toggle='modal' data-target='#cdAddCCpsy' ><i class='fa fa-list-ol'></i></button>"
			}
		],
		"language": idioma_espanol
	});
	obtener_data_editar_cooperativa_cuentas("#dt_dc tbody", table);
	obtener_id_eliminar_cooperativa_cuentas("#dt_dc tbody", table);
	obtener_data_agregar_cuenta_concepto("#dt_dc tbody", table);

}


 

var obtener_data_editar_cooperativa_cuentas = function (tbody, table) {
	$(tbody).on("click", "button.editarCps", function () {
		var data = table.row($(this).parents("tr")).data();
		idccx = $("#idccx").val(data.id);
		coopccx = $("#coopccx").val(data.nombre_cooperativa);
		cueccx = $("#cueccx").val(data.cuenta);
		salexcc = $("#salexcc").val(data.saldo);
	});
}

var obtener_data_agregar_cuenta_concepto = function (tbody, table) {
	$(tbody).on("click", "button.addCps", function () {
		var data = table.row($(this).parents("tr")).data();
		idcuecop = $("#idcuecopx").val(data.id);
	});
}

var obtener_id_eliminar_cooperativa_cuentas = function (tbody, table) {
	$(tbody).on("click", "button.eliminarCps", function () {
		var data = table.row($(this).parents("tr")).data();
		idCdDel = $("#idCdDel").val(data.id);
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

function agregarCd() {
	var cp = document.frmAddCd.cp.value;
	var ce = document.frmAddCd.ce.value;
	var sal = document.frmAddCd.sal.value;
	var agregar = "agregar";
	if (sal == "") {
		alert("No aplicó el saldo inicial de la cuenta.");
	} else {
		//alert("Datos: " + cp + " , " + ce + " , " + sal + " , " + agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/detallesConceptosController.php", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("add=" + agregar + "&cp=" + cp  + "&sal=" + sal +"&ce="+ ce);
	}

}


function agregarCc() {
	var idcuecop = document.cdAddCCpsx.idcuecop.value;
	var signocc = document.cdAddCCpsx.signocc.value;
	var conceptocc = document.cdAddCCpsx.conceptocc.value;
	var agregar = "agregar";
	if (sal == "") {
		alert("No aplicó el saldo inicial de la cuenta.");
	} else {
		//alert("Datos: " + idcuecop + " , " + signocc + " , " + conceptocc + " , " + agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/detallesConceptosController.php", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("addd=" + agregar + "&idcuecop=" + idcuecop  + "&signocc=" + signocc +"&conceptocc="+ conceptocc);
	}

}




function editarCd() {
	var id = document.frmecc.idcentas.value; 
	var ccoop = document.frmecc.cp.value; 
	var ccue = document.frmecc.ce.value;
	var sal = document.frmecc.sal.value;
	if (sal == "") {
		alert("No aplicó el saldo inicial de la cuenta.");
	} else {
		//alert("Datos: " + ccoop + " , " + ccue + " , " + sal + " , " );
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/detallesConceptosController.php", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				//alert('Cuenta actualizada exitosamente');
				listarc();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id=" + id + "&cp=" + ccoop +  "&ce=" + ccue + "&sal=" + sal);
	}
}

function eliminarCd() {
	var id = document.frmEliminarCc.idCdDel.value;
	//alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/detallesConceptosController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);
}

function asignarvalor(input, select)
{
	var lista = document.getElementById(select);
	var opcion = lista.options[lista.selectedIndex].textContent;
	var variable = document.getElementById(input); 
	variable.value = opcion;
}
