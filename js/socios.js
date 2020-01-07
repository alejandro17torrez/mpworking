$(document).on("ready", function(){
    listarc();
});

$("#addSoc").on('click', function(){
    $("#addsocios").modal('show');
});





var listarc = function() {
    var table = $("#dt_socios").DataTable({
        "destroy": true,
        "ajax":{
            "method":"POST",
            "url":"../controllers/socioController.php"
        },
        "columns":[
            {"data":"nombreI"},
            {"data":"nombreII"},
            {"data":"apellidoI"},
            {"data":"apellidoII"},
			{"data": "fechaNacimiento"},
			{"data": "cedula"},
			{"data": "desc"},
			{"data": "nombre_cooperativa"},
            {"defaultContent": "<button type='button' class='editarS btn btn-primary' data-toggle='modal' data-target='#SociosEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarS btn btn-danger' data-toggle='modal' data-target='#SociosEliminar' ><i class='fa fa-trash-o'></i></button>"}
        ],
        "language": idioma_espanol
    });
   obtener_data_editar("#dt_socios tbody", table);
   obtener_id_eliminar("#dt_socios tbody", table);

}

var obtener_data_editar = function (tbody, table) {
    $(tbody).on("click", "button.editarS", function () {
       var data = table.row($(this).parents("tr")).data();
	     idsocioe = $("#idsocioe").val(data.id);
         nsocioe = $("#nsocioe").val(data.nombreI);
         nnsocioe = $("#nnsocioe").val(data.nombreII); 
         asocioe = $("#asocioe").val(data.apellidoI);
         aasocioe = $("#aasocioe").val(data.apellidoII);
		 csocioe = $("#carexe").val(data.desc);
		 cesocioe = $("#cesocioe").val(data.cedula);
		 ccoope = $("#ccoopexe").val(data.nombre_cooperativa);
		 fnsocioe = $("#fnsocioex").val(data.fechaNacimiento);
    });
            
}

var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminarS", function () {
       var data = table.row($(this).parents("tr")).data();
       idsocioDel = $("#idsocioDel").val(data.id);
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

function agregarSocios()
{ 
	var nsocio = document.frmAddSocios.nsocio.value;
	var nnsocio = document.frmAddSocios.nnsocio.value;
	var asocio = document.frmAddSocios.asocio.value;
	var aasocio = document.frmAddSocios.aasocio.value;
	var csocio = document.frmAddSocios.car.value;
	var cesocio = document.frmAddSocios.cesocio.value;
	var fnsocio = document.frmAddSocios.fnsocio.value;
	var ccoop = document.frmAddSocios.ccoop.value;
	var agregar = "agregar";
	if (nsocio == "" || asocio == "" || csocio == "" || cesocio == "" || fnsocio == "" || ccoop == "") {
		if (nsocio == "") {
			alert("faltó el campo: primer nombre del socio ");
		}
		if (asocio == "") {
			alert("faltó el campo: primer apellido del socio ");
		}
		if (csocio == "") {
			alert("faltó el campo: cargo del socio");
		}
		if (cesocio == "") {
			alert("faltó el campo: cedula del socio");
		}
		if (fnsocio == "") {
			alert("faltó el campo: fecha de nacimiento del socio");
		}
		if (ccop == "") {
			alert("faltó el campo: cooperativa a la que el socio pertenece");
		}
	}
	else
	{
		//alert("Datos: "+nsocio+" , "+nnsocio+" , "+asocio+", "+aasocio+" , "+csocio+" , "+cesocio+" , "+fnsocio+" , "+ccoop+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/socioController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ns="+nsocio+"&nns="+nnsocio+"&as="+asocio+"&aas="+aasocio+"&cs="+csocio+"&ces="+cesocio+"&fns="+fnsocio+"&cc="+ccoop+"&add="+agregar);
	}

}

function editarSocios()
{
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.cbcare.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.cbccoope.value; 
	if (nsocioe == "" || asocioe == "" || csocioe == "" || cesocioe == "" || fnsocioe == "" || ccoope == "") {
		if (nsocioe == "") {
			alert("faltó el campo: primer nombre del socio ");
		}
		if (asocioe == "") {
			alert("faltó el campo: primer apellido del socio ");
		}
		if (csocioe == "") {
			alert("faltó el campo: cargo del socio");
		}
		if (cesocioe == "") {
			alert("faltó el campo: cedula del socio");
		}
		if (fnsocioe == "") {
			alert("faltó el campo: fecha de nacimiento del socio");
		}
		if (ccope == "") {
			alert("faltó el campo: cooperativa a la que el socio pertenece");
		}
	}
	else
	{
		//alert("Datos: "+nsocioe+" , "+nnsocioe+" , "+asocioe+", "+aasocioe+" , "+csocioe+" , "+cesocioe+" , "+fnsocioe+" , "+ccoope+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/socioController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta actualizada exitosamente');
				listarc();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id="+id+"&ns="+nsocioe+"&nns="+nnsocioe+"&as="+asocioe+"&aas="+aasocioe+"&cs="+csocioe+"&ces="+cesocioe+"&fns="+fnsocioe+"&cc="+ccoope);
	}
}

function eliminarSocios()
{
	var id = document.frmEliminarSocio.idsocioDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}

function asignarvalor(input, select)
{
	var lista = document.getElementById(select);
	var opcion = lista.options[lista.selectedIndex].textContent;
	var variable = document.getElementById(input); 
	variable.value = opcion;
}

