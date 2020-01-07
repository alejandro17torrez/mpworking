$(document).on("ready", function () {
    listarcargo();
    listargrupo();
    listarsgrupo();
	listartipo();
	document.getElementById("defaultOpen").click();
});

$("#grupo").on('click', function () {
    $("#addgr").modal('show');
});


$("#sgrupo").on('click', function () {
    $("#addsubgr").modal('show');
});

$("#tipoadd").on('click', function () {
    $("#addtipo").modal('show');
});

$("#cargosadd").on('click', function () {
    $("#addcargo").modal('show');
});



var listarcargo = function () {
    var table = $("#dt_cargo").DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "../controllers/cargoController.php"
        },
        "columns": [{
                "data": "desc"
            },
            {
                "defaultContent": "<button type='button' class='editarcargo btn btn-primary' data-toggle='modal' data-target='#editcargo'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarcargo btn btn-danger' data-toggle='modal' data-target='#CargoEliminar' ><i class='fa fa-trash-o'></i></button>"
            }
        ],
        "language": idioma_espanol
    });
    obtener_data_editar_cargo("#dt_cargo tbody", table);
    obtener_id_eliminar_cargo("#dt_cargo tbody", table);

}

var obtener_data_editar_cargo = function (tbody, table) {
    $(tbody).on("click", "button.editarcargo", function () {
        var data = table.row($(this).parents("tr")).data();
        id = $("#idcare").val(data.id);
        ncare = $("#ncare").val(data.desc);
    });

}

var obtener_id_eliminar_cargo = function (tbody, table) {
    $(tbody).on("click", "button.eliminarcargo", function () {
        var data = table.row($(this).parents("tr")).data();
        idcarDel = $("#idcarDel").val(data.id);
    });
}



var listargrupo = function () {
    var table = $("#dt_gr").DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "../controllers/gruposController.php"
        },
        "columns": [{
                "data": "grupo"
            },
            {
                "defaultContent": "<button type='button' class='editargrupo btn btn-primary' data-toggle='modal' data-target='#editgr'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminargrupo btn btn-danger' data-toggle='modal' data-target='#GrupoEliminar' ><i class='fa fa-trash-o'></i></button>"
            }
        ],
        "language": idioma_espanol
    });
    obtener_data_editar_grupo("#dt_gr tbody", table);
    obtener_id_eliminar_grupo("#dt_gr tbody", table);

}

var obtener_data_editar_grupo = function (tbody, table) {
    $(tbody).on("click", "button.editargrupo", function () {
        var data = table.row($(this).parents("tr")).data();
        id = $("#idgr").val(data.id);
        ngre = $("#ngre").val(data.grupo);
    });

}

var obtener_id_eliminar_grupo = function (tbody, table) {
    $(tbody).on("click", "button.eliminargrupo", function () {
        var data = table.row($(this).parents("tr")).data();
        idgrDel = $("#idgrDel").val(data.id);
    });
}



var listarsgrupo = function () {
    var table = $("#dt_subgr").DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "../controllers/subgrupoController.php"
        },
        "columns": [{
                "data": "subgrupo"
            },
            {
                "defaultContent": "<button type='button' class='editarsgrupo btn btn-primary' data-toggle='modal' data-target='#editsubgr'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminarsgrupo btn btn-danger' data-toggle='modal' data-target='#SgrupoEliminar' ><i class='fa fa-trash-o'></i></button>"
            }
        ],
        "language": idioma_espanol
    });
    obtener_data_editar_sgrupo("#dt_subgr tbody", table);
    obtener_id_eliminar_sgrupo("#dt_subgr tbody", table);

}

var obtener_data_editar_sgrupo = function (tbody, table) {
    $(tbody).on("click", "button.editarsgrupo", function () {
        var data = table.row($(this).parents("tr")).data();
        id = $("#idsgr").val(data.id);
        ngre = $("#nsgre").val(data.subgrupo);
    });

}

var obtener_id_eliminar_sgrupo = function (tbody, table) {
    $(tbody).on("click", "button.eliminarsgrupo", function () {
        var data = table.row($(this).parents("tr")).data();
        idsgrDel = $("#idsgrDel").val(data.id);
    });
}


var listartipo = function () {
    var table = $("#dt_tipo").DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "../controllers/tipoController.php"
        },
        "columns": [{
                "data": "tipo"
            },
            {
                "defaultContent": "<button type='button' class='editartipo btn btn-primary' data-toggle='modal' data-target='#edittipo'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminartipo btn btn-danger' data-toggle='modal' data-target='#tipoEliminar' ><i class='fa fa-trash-o'></i></button>"
            }
        ],
        "language": idioma_espanol
    });
    obtener_data_editar_tipo("#dt_tipo tbody", table);
    obtener_id_eliminar_tipo("#dt_tipo tbody", table);

}

var obtener_data_editar_tipo = function (tbody, table) {
    $(tbody).on("click", "button.editartipo", function () {
        var data = table.row($(this).parents("tr")).data();
        id = $("#idtipo").val(data.id);
        ngre = $("#ntce").val(data.tipo);
    });

}

var obtener_id_eliminar_tipo = function (tbody, table) {
    $(tbody).on("click", "button.eliminartipo", function () {
        var data = table.row($(this).parents("tr")).data();
        idtipoDel = $("#idtipoDel").val(data.id);
    });
}


var idioma_espanol = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
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



function add_employed()
{ 
	var ncar = document.frmAddCargos.ncar.value;
	var agregar = "agregar";
	if (ncar == "") {
		if (ncar == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		alert("Datos: "+ncar+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/cargoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ncar="+ncar+"&add="+agregar);
	}

}

function add_group()
{ 
	var ngr = document.frmAddgrupo.ngr.value;
	var agregar = "agregar";
	if (ngr == "") {
		if (ngr == "") {
			alert("faltó el campo: nombre del grupo");
		}

	}
	else{
		alert("Datos: "+ngr+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/gruposController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ngr="+ngr+"&add="+agregar);
	}
}

function add_subgroup()
{ 
	var nsgr = document.frmAddsgrupo.nsgr.value;
	var agregar = "agregar";
	if (nsgr == "") {
		if (nsgr == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+nsgr+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/subgrupoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("nsgr="+nsgr+"&add="+agregar);
	}

}

function add_type()
{ 
	var ntc = document.frmAddtipo.ntc.value;
	var agregar = "agregar";
	if (ntc == "") {
		if (ntc == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+ntc+" , "+agregar);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/tipoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ntc="+ntc+"&add="+agregar);
	}

}

function edit_employed()
{ 
    var ncare = document.frmEditCargos.ncare.value;
    var id = document.frmEditCargos.idcare.value;

	if (ncare == "") {
		if (ncare == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+ncare+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/cargoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				listarcargo();
				//window.location.reload(true);
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ncare="+ncare+"&id="+id);
	}

}

function edit_group()
{ 
    var ngre = document.frmEditgrupo.ngre.value;
    var id = document.frmEditgrupo.idgr.value;

	if (ngre == "") {
		if (ngre == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+ngre+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/gruposController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				//window.location.reload(true);
				listargrupo();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ngre="+ngre+"&id="+id);
	}
}

function edit_subgroup()
{ 
    var nsgre = document.frmEditsgrupo.nsgre.value;
    var id = document.frmEditsgrupo.idsgr.value;

	if (nsgre == "") {
		if (nsgre == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+nsgre+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/subgrupoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				//window.location.reload(true);
				listarsgrupo();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("nsgre="+nsgre+"&id="+id);
	}

}

function edit_type()
{ 
    var ntce = document.frmEdittipo.ntce.value;
    var id = document.frmEdittipo.idtipo.value;

	if (ntce == "") {
		if (ntce == "") {
			alert("faltó el campo: nombre del cargo");
		}

	}
	else{
		//alert("Datos: "+ntce+" , "+id);
		ajax = AJAXObject();
		ajax.open("POST", "../controllers/tipoController.php", true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				//alert('Cuenta agregada exitosamente');
				//window.location.reload(true);
				listartipo();
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ntce="+ntce+"&id="+id);
	}

}

function delete_employed()
{ 
	var id = document.frmEliminarCar.idcarDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/cargoController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cuenta eliminar exitosamente');
			listarcargo();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}


function delete_group()
{ 
	var id = document.frmEliminarGr.idgrDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/gruposController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cuenta eliminar exitosamente');
			listargrupo();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}

function delete_subgroup()
{ 
	var id = document.frmEliminarSgr.idsgrDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/subgrupoController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cuenta eliminar exitosamente');
			listarsgrupo();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);
}


function delete_type()
{ 
	var id = document.frmEliminarTipo.idtipoDel.value; 
	//alert("Datos: "+id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/tipoController.php", true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			//alert('Cuenta eliminar exitosamente');
			listarb();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd="+id);

}



function openPage(pageName, elmnt, color) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
	  tabcontent[i].style.display = "none";
	}

	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
	  tablinks[i].style.backgroundColor = "";
	}
  
	document.getElementById(pageName).style.display = "block";
	elmnt.style.backgroundColor = color;
  }


