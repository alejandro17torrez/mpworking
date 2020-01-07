$(document).on("ready", function(){
    listarc();
});

$("#addCuentas").on('click', function(){
    $("#addcts").modal('show');
});

var listarc = function() {
    var table = $("#dt_cuentas").DataTable({
        "destroy": true,
        "ajax":{
            "method":"POST",
            "url":"../controllers/cuentasController.php"
        },
        "columns":[
            {"data":"codigo"},
            {"data":"cuenta"},
            {"data":"grupo"},
            {"data":"subgrupo"},
            {"data": "tipo"},
            {"defaultContent": "<button type='button' class='editarC btn btn-primary' data-toggle='modal' data-target='#cuentasEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarC btn btn-danger' data-toggle='modal' data-target='#cuentasEliminar' ><i class='fa fa-trash-o'></i></button> <button type='button' class='ver btn btn-dark' data-toggle='modal' data-target='#'><i class='fa fa-registered'></i></button>"}
        ],
        "language": idioma_espanol
    });
   obtener_data_editar("#dt_cuentas tbody", table);
   obtener_id_eliminar("#dt_cuentas tbody", table);

}

var obtener_data_editar = function (tbody, table) {
    $(tbody).on("click", "button.editarC", function () {
       var data = table.row($(this).parents("tr")).data();
         idcuenta = $("#idCuentas").val(data.id);
         ccuenta = $("#codC").val(data.codigo);
         descuenta = $("#des").val(data.cuenta); 
         grupoCuenta = $("#gcuentae").val(data.grupo);
         subgrupoCuenta = $("#sgcuentae").val(data.subgrupo);
         tipoCuenta = $("#tcuentae").val(data.tipo);

    });
            
}

var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminarC", function () {
       var data = table.row($(this).parents("tr")).data();
       idcuenta = $("#idCuentasDel").val(data.codigo);
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

function agregarCuentas()
{ 
	var codCuenta = document.frmAddCuentas.codCuenta.value;
	var descCuenta = document.frmAddCuentas.descCuenta.value;
	var grupoCuenta = document.frmAddCuentas.cbGrupoCuenta.value;
	var subgrupoCuenta = document.frmAddCuentas.cbSubgrupoCuenta.value;
	var tipoCuenta = document.frmAddCuentas.cbTipo.value;
	var agregar = "agregar";
	if (codCuenta == "" || descCuenta == "" || grupoCuenta == "" || subgrupoCuenta == "" || tipoCuenta == "")
	{
		if (codCuenta == "") 
		{
			alert("Falta el campo código de cuenta");
		}
		if (descCuenta == "") 
		{
			alert("Falta el campo descripción de cuenta");
		}
		if (grupoCuenta == "") 
		{
			alert("Falta el campo grupo de la cuenta");
		}
		if (subgrupoCuenta == "") 
		{
			alert("falta el campo sub grupo de la cuenta");
		}
		if (tipoCuenta == "") 
		{
			alert("Falta el campo tipo de cuenta");	
		}
	}
	else 
	{
		//alert("Datos: "+codCuenta+" , "+descCuenta+" , "+grupoCuenta+", "+subgrupoCuenta+" , "+tipoCuenta+", "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/cuentasController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("cc="+codCuenta+"&dc="+descCuenta+"&gc="+grupoCuenta+"&sgc="+subgrupoCuenta+"&tc="+tipoCuenta+"&add="+agregar);
	
	}
}

function editarCuentas()
{
	var id = document.frmEditCuentas.idCuentas.value;
	var codCuenta = document.frmEditCuentas.codCuenta.value;
	var descCuenta = document.frmEditCuentas.desCuenta.value;
	var grupoCuenta = document.frmEditCuentas.cbGrupoCuenta.value;
	var subgrupoCuenta = document.frmEditCuentas.cbSubgrupoCuenta.value;
	var tipoCuenta = document.frmEditCuentas.cbTipo.value; 
	if (codCuenta == "" || descCuenta == "" || grupoCuenta == "" || subgrupoCuenta == "" || tipoCuenta == "")
	{
		if (codCuenta == "") 
		{
			alert("Falta el campo código de cuenta");
		}
		if (descCuenta == "") 
		{
			alert("Falta el campo descripción de cuenta");
		}
		if (grupoCuenta == "") 
		{
			alert("Falta el campo grupo de la cuenta");
		}
		if (subgrupoCuenta == "") 
		{
			alert("falta el campo sub grupo de la cuenta");
		}
		if (tipoCuenta == "") 
		{
			alert("Falta el campo tipo de cuenta");	
		}
	}
	else
	{
		//alert("Datos: "+codCuenta+" , "+descCuenta+" , "+grupoCuenta+", "+subgrupoCuenta+" , "+tipoCuenta+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/cuentasController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta actualizada exitosamente');
				listarc(); 
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id="+id+"&cc="+codCuenta+"&dc="+descCuenta+"&gc="+grupoCuenta+"&sgc="+subgrupoCuenta+"&tc="+tipoCuenta);
	
	}


}

function eliminarCuentas()
{
	var id = document.frmEliminarCuentas.idCuentasDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/cuentasController.php", true);
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































