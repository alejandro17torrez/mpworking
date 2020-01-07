
$(document).on("ready", function () {
	
	$(".ocultar").prop("disabled", true);
	$(".ocultars").prop("disabled", true);
	$(".oculta").prop("disabled", true);
	$(".ocultare").prop("disabled", true);
	$(".ocultarse").prop("disabled", true);
	$(".ocultae").prop("disabled", true);
	$(".esconder").css('visibility', 'hidden');
	//alert("GAVER YA CARGO");
	sacarComprobantesDiario();
	//este truco es para que espere a que el primer ajax se complete y pueda ejecutar el siguiente
	setTimeout(sacarSaldosMes, 500);
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	
});

$("#addri").on('click', function () {
	$("#Addri").modal('show');
});

$("#addre").on('click', function () {
	$("#Addre").modal('show');
});
$("#addfac").on('click', function () {
	$("#Fact").modal('show');
});
$("#addch").on('click', function () {
	$("#Che").modal('show');
});
$("#addret").on('click', function () {
	$("#Reten").modal('show');
});
$("#addfas").on('click', function () {
	$("#comprobantesModal").modal('show');
});




$('#sin_causa').on('change', function () {
	if ($(this).is(':checked')) {
		$(".causa").prop("disabled", false);
	} else {
		$(".causa").prop("disabled", true);
	}
});

$('#deshabilitar').on('change', function () {
	if ($(this).is(':checked')) {
		$(".ocultar").prop("disabled", false);
		$(".ocultars").prop("disabled", true);

	} else {
		$(".ocultar").prop("disabled", true);
		$(".ocultars").prop("disabled", false);
	}
});

$('#deshabilitarc').on('change', function () {
	if ($(this).is(':checked')) {
		$(".oculta").prop("disabled", true);
	} else {
		$(".oculta").prop("disabled", false);
	}
});

$('#deshabilitare').on('change', function () {
	if ($(this).is(':checked')) {
		$(".ocultare").prop("disabled", false);
		$(".ocultarse").prop("disabled", true);

	} else {
		$(".ocultare").prop("disabled", true);
		$(".ocultarse").prop("disabled", false);
	}
});

$('#deshabilitarce').on('change', function () {
	if ($(this).is(':checked')) {
		$(".ocultae").prop("disabled", true);
	} else {
		$(".ocultae").prop("disabled", false);
	}
});

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

//  Ingresos

function agregarRi() {
	var idcoop = document.frmAddRi.idfi.value;
	var fecha = document.frmAddRi.fecha.value;
	var numeroReciboIngreso = document.frmAddRi.numeroReciboIngreso.value;
	var tipoIndividuoIngreso = document.frmAddRi.tipoIndividuoIngreso.value;
	var nombre = null;
	if (tipoIndividuoIngreso == "Socio") {
		nombre = document.frmAddRi.IngresoSocio.value;
	} else
	if (tipoIndividuoIngreso == "Tercero") {
		nombre = document.frmAddRi.IngresoTercero.value
	}
	var tipoMonedaIngreso = document.frmAddRi.tipoMonedaIngreso.value;
	var CantidadIngreso = document.frmAddRi.CantidadIngreso.value;
	var cantidadLetraIngreso = document.frmAddRi.cantidadLetraIngreso.value;
	var Cconcepto = document.frmAddRi.Cconcepto.value;
	var cuentaAfectada = document.frmAddRi.cuentaAfectada.value;
	var BauncherIngreso = null;
	var cuentasbancos = null;
	if (cuentaAfectada == "1102") {
		BauncherIngreso = document.frmAddRi.BauncherIngreso.value;
		cuentasbancos = document.frmAddRi.cuentasbancos.value;
	} else
	if (cuentaAfectada == "110101") {
		BauncherIngreso = "";
		cuentasbancos = "";
	}
	var departamentoIngreso = document.frmAddRi.departamentoIngreso.value;
	var municipioIngreso = document.frmAddRi.municipioIngreso.value;
	var agregar = "agregar";
	//alert("Datos: " + idcoop + " , " + fecha + " , " + numeroReciboIngreso + ", " + tipoIndividuoIngreso + " , " + nombre + " , " + tipoMonedaIngreso + " , " + CantidadIngreso + " , " + cantidadLetraIngreso + " , " + Cconcepto + " , " + cuentaAfectada + " , " + BauncherIngreso + " , " + cuentasbancos + " , " + departamentoIngreso + " , " + municipioIngreso + " , " + agregar);


	ajax = AJAXObject();
	ajax.open("POST", "../controllers/ingresoController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idcoop=" + idcoop + "&fecha=" + fecha + "&nringreso=" + numeroReciboIngreso + "&tiingreso=" + tipoIndividuoIngreso + "&nombre=" + nombre + "&tmonedain=" + tipoMonedaIngreso + "&cantin=" + CantidadIngreso + "&cantletrasin=" + cantidadLetraIngreso + "&concepto=" + Cconcepto + "&cuentafectada=" + cuentaAfectada + "&baucher=" + BauncherIngreso + "&cuentasbancos=" + cuentasbancos + "&deptomunicipio=" + (departamentoIngreso + " , " + municipioIngreso) + "&add=" + agregar);

}




function editarRi() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	//alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/ingresoController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarRi() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	//alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/ingresoController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// agregar RE

function agregarRe() {

	var idcoopre = document.frmAddRe.idcoopre.value;
	var fechare = document.frmAddRe.fechare.value;
	var numeroReciboEgreso = document.frmAddRe.numeroReciboEgreso.value;
	var tipoIndividuoEgreso = document.frmAddRe.tipoIndividuoEgreso.value;
	var nombre = null;
	if (tipoIndividuoEgreso == "Socio") {
		nombre = document.frmAddRe.EgresoSocio.value;
	} else
	if (tipoIndividuoEgreso == "Tercero") {
		nombre = document.frmAddRe.EgresoTercero.value
	}
	var tipoMonedaEgreso = document.frmAddRe.tipoMonedaEgreso.value;
	var CantidadEgreso = document.frmAddRe.CantidadEgreso.value;
	var cantidadLetraEgreso = document.frmAddRe.cantidadLetraEgreso.value;
	var Cconceptoe = document.frmAddRe.Cconceptoe.value;
	var cuentaAfectada = document.frmAddRe.cuentaAfectadae.value;
	var BauncherEgreso = null;
	var cuentasbancos = null;
	if (cuentaAfectada == "1102") {
		BauncherEgreso = document.frmAddRe.BauncherEgreso.value;
		cuentasbancos = document.frmAddRe.cuentasbancose.value;
	} else
	if (cuentaAfectada == "110101") {
		BauncherEgreso = "";
		cuentasbancos = "";
	}
	var departamentoEgreso = document.frmAddRe.departamentoEgreso.value;
	var municipioEgreso = document.frmAddRe.municipioEgreso.value;
	var agregar = "agregar";
	//alert("Datos: " + idcoopre + " , " + fechare + " , " + numeroReciboEgreso + ", " + tipoIndividuoEgreso + " , " + nombre + " , " + tipoMonedaEgreso + " , " + CantidadEgreso + " , " + cantidadLetraEgreso + " , " + Cconceptoe + " , " + cuentaAfectada + " , " + BauncherEgreso + " , " + cuentasbancos + " , " + departamentoEgreso + " , " + municipioEgreso + " , " + agregar);


	ajax = AJAXObject();
	ajax.open("POST", "../controllers/egresoController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idcoopre=" + idcoopre + "&fechare=" + fechare + "&nregreso=" + numeroReciboEgreso + "&tiegreso=" + tipoIndividuoEgreso + "&nombre=" + nombre + "&tmonedae=" + tipoMonedaEgreso + "&cante=" + CantidadEgreso + "&cantletrase=" + cantidadLetraEgreso + "&concepto=" + Cconceptoe + "&cuentafectada=" + cuentaAfectada + "&baucher=" + BauncherEgreso + "&cuentasbancos=" + cuentasbancos + "&deptomunicipio=" + (departamentoEgreso + " , " + municipioEgreso) + "&add=" + agregar);


}

function editarRe() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	//alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarRe() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	//alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// cheques

function agregarCh() {
	var idcoopch = document.frmAddChe.idcoopch.value;
	var numeroCuenta = document.frmAddChe.numeroCuenta.value;
	var numeroCheque = document.frmAddChe.numeroCheque.value;
	var departamentoCheque = document.frmAddChe.departamentoCheque.value;
	var municipioCheque = document.frmAddChe.municipioCheque.value;
	var fechaCheque = document.frmAddChe.fechaCheque.value;
	var nombre = document.frmAddChe.pagueseCheque.value;
	var monedaCheque = document.frmAddChe.monedaCheque.value;
	var cantidadCheque = document.frmAddChe.cantidadCheque.value;
	var cantidadLetrasCheque = document.frmAddChe.cantidadLetrasCheque.value;
	var conceptoCheque = document.frmAddChe.conceptoCheque.value;
	var agregar = "agregar";

	//alert("Datos: " + idcoopch + " , " + numeroCuenta + " , " + numeroCheque + ", " + departamentoCheque + " , " + municipioCheque + " , " + fechaCheque + " , " + nombre + " , " + monedaCheque + " , " + cantidadCheque+ " , " +cantidadLetrasCheque+ " , " +conceptoCheque+ " , " +agregar);

	
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/chequesController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idcoopch=" + idcoopch + "&numeroCuenta=" + numeroCuenta + "&numeroCheque=" + numeroCheque + "&departamentoCheque=" + (departamentoCheque +" , "+municipioCheque) + "&fechaCheque=" + fechaCheque + "&nombre=" + nombre + "&monedaCheque=" + monedaCheque + "&cantidadCheque=" +cantidadCheque+ "&cantidadLetrasCheque=" +cantidadLetrasCheque+ "&conceptoCheque=" +conceptoCheque+ "&add=" + agregar);
	
}

function editarCh() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	//alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarCh() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	//alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// retiros

function agregarReti() {
	var nsocio = document.frmAddSocios.nsocio.value;
	var nnsocio = document.frmAddSocios.nnsocio.value;
	var asocio = document.frmAddSocios.asocio.value;
	var aasocio = document.frmAddSocios.aasocio.value;
	var csocio = document.frmAddSocios.csocio.value;
	var cesocio = document.frmAddSocios.cesocio.value;
	var fnsocio = document.frmAddSocios.fnsocio.value;
	var ccoop = document.frmAddSocios.ccoop.value;
	var agregar = "agregar";
	alert("Datos: " + nsocio + " , " + nnsocio + " , " + asocio + ", " + aasocio + " , " + csocio + " , " + cesocio + " , " + fnsocio + " , " + ccoop + " , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("ns=" + nsocio + "&nns=" + nnsocio + "&as=" + asocio + "&aas=" + aasocio + "&cs=" + csocio + "&ces=" + cesocio + "&fns=" + fnsocio + "&cc=" + ccoop + "&add=" + agregar);
}

function editarReti() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarReti() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// Retenciones

function agregarReten() {
	var nsocio = document.frmAddSocios.nsocio.value;
	var nnsocio = document.frmAddSocios.nnsocio.value;
	var asocio = document.frmAddSocios.asocio.value;
	var aasocio = document.frmAddSocios.aasocio.value;
	var csocio = document.frmAddSocios.csocio.value;
	var cesocio = document.frmAddSocios.cesocio.value;
	var fnsocio = document.frmAddSocios.fnsocio.value;
	var ccoop = document.frmAddSocios.ccoop.value;
	var agregar = "agregar";
	alert("Datos: " + nsocio + " , " + nnsocio + " , " + asocio + ", " + aasocio + " , " + csocio + " , " + cesocio + " , " + fnsocio + " , " + ccoop + " , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("ns=" + nsocio + "&nns=" + nnsocio + "&as=" + asocio + "&aas=" + aasocio + "&cs=" + csocio + "&ces=" + cesocio + "&fns=" + fnsocio + "&cc=" + ccoop + "&add=" + agregar);
}

function editarReten() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarReten() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// facturas

function agregarFact() {
	var nsocio = document.frmAddSocios.nsocio.value;
	var nnsocio = document.frmAddSocios.nnsocio.value;
	var asocio = document.frmAddSocios.asocio.value;
	var aasocio = document.frmAddSocios.aasocio.value;
	var csocio = document.frmAddSocios.csocio.value;
	var cesocio = document.frmAddSocios.cesocio.value;
	var fnsocio = document.frmAddSocios.fnsocio.value;
	var ccoop = document.frmAddSocios.ccoop.value;
	var agregar = "agregar";
	//alert("Datos: " + nsocio + " , " + nnsocio + " , " + asocio + ", " + aasocio + " , " + csocio + " , " + cesocio + " , " + fnsocio + " , " + ccoop + " , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("ns=" + nsocio + "&nns=" + nnsocio + "&as=" + asocio + "&aas=" + aasocio + "&cs=" + csocio + "&ces=" + cesocio + "&fns=" + fnsocio + "&cc=" + ccoop + "&add=" + agregar);
}

function editarFact() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	//alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarFact() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	//alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// detalles factura

function agregarFactd() {
	var nsocio = document.frmAddSocios.nsocio.value;
	var nnsocio = document.frmAddSocios.nnsocio.value;
	var asocio = document.frmAddSocios.asocio.value;
	var aasocio = document.frmAddSocios.aasocio.value;
	var csocio = document.frmAddSocios.csocio.value;
	var cesocio = document.frmAddSocios.cesocio.value;
	var fnsocio = document.frmAddSocios.fnsocio.value;
	var ccoop = document.frmAddSocios.ccoop.value;
	var agregar = "agregar";
	alert("Datos: " + nsocio + " , " + nnsocio + " , " + asocio + ", " + aasocio + " , " + csocio + " , " + cesocio + " , " + fnsocio + " , " + ccoop + " , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("ns=" + nsocio + "&nns=" + nnsocio + "&as=" + asocio + "&aas=" + aasocio + "&cs=" + csocio + "&ces=" + cesocio + "&fns=" + fnsocio + "&cc=" + ccoop + "&add=" + agregar);
}

function editarFactd() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarFactd() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/socioController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}


// detalles comprobantes 

function agregarComD() {
	var fecha = document.frmAddRi.fecha.value;
	var idfi = document.frmAddRi.idfi.value;
	var Cconcepto = document.frmAddRi.Cconcepto.value;
	var agregar = "agregar";
	alert("Datos: " + fecha + " , " + idfi + " , " + Cconcepto + "  , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/comprobanteController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("fe=" + fecha + "&idf=" + idfi + "&co=" + Cconcepto + "&add=" + agregar);
}


function editarComD() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/comprobanteController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarComD() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/comprobanteController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}


// documentos

function agregarDoc() {
	var fecha = document.frmAddRi.fecha.value;
	var idfi = document.frmAddRi.idfi.value;
	var tipo = document.frmAddRi.tipo.value;
	var nu = document.frmAddRi.nu.value;
	var Cconcepto = document.frmAddRi.Cconcepto.value;
	var agregar = "agregar";
	alert("Datos: " + fecha + " , " + idfi + " , " + Cconcepto + "  , " + agregar);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/documentacionController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("fe=" + fecha + "&idf=" + idfi + "&co=" + Cconcepto + "&add=" + agregar);
}


function editarComD() {
	var id = document.frmEditSocios.idsocioe.value;
	var nsocioe = document.frmEditSocios.nsocioe.value;
	var nnsocioe = document.frmEditSocios.nnsocioe.value;
	var asocioe = document.frmEditSocios.asocioe.value;
	var aasocioe = document.frmEditSocios.aasocioe.value;
	var csocioe = document.frmEditSocios.csocioe.value;
	var cesocioe = document.frmEditSocios.cesocioe.value;
	var fnsocioe = document.frmEditSocios.fnsocioe.value;
	var ccoope = document.frmEditSocios.ccoope.value;
	alert("Datos: " + nsocioe + " , " + nnsocioe + " , " + asocioe + ", " + aasocioe + " , " + csocioe + " , " + cesocioe + " , " + fnsocioe + " , " + ccoope + " , " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/documentacionController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta actualizada exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&ns=" + nsocioe + "&nns=" + nnsocioe + "&as=" + asocioe + "&aas=" + aasocioe + "&cs=" + csocioe + "&ces=" + cesocioe + "&fns=" + fnsocioe + "&cc=" + ccoope);

}

function eliminarComD() {
	var id = document.frmEliminarSocio.idsocioDel.value;
	alert("Datos: " + id);
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/documentacionController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta eliminar exitosamente');
			listarc();
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idd=" + id);

}

// metodo para hacer triple insertado COMPROBANTE - DOCUMENTO - RECIBO INGRESO
function agregarCDRI() {

}

function sacarComprobantesDiario() {
	var idCooperativa, mesSeleccionado, lista;
	idCooperativa = document.getElementById("idCooperativa_Ingreso").value;
	lista = document.getElementById("selectorMes");
	mesSeleccionado = lista.options[lista.selectedIndex].value;

	ajax = AJAXObject();
	ajax.open("POST", "../controllers/vistaComprobantesController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			var objeto = JSON.parse(this.responseText);
			//alert(this.responseText);
			//console.log(JSON.stringify(objeto));
			mostrarComprobantesDiario(objeto);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idcoop=" + idCooperativa + "&mes=" + mesSeleccionado + "&parametro=" + "mostrar");
}

function mostrarComprobantesDiario(vResulsetServidor) {
	//para depurar las gavers
	var tabla = document.getElementById('tablaConceptos');
	//esto limpia la tabla de previo para que no se amontonen las celdas de los comprobantes de diario
	tabla.innerHTML="<thead><tr><th>Numero de Asiento</th><th>Fecha</th><th>Concepto</th><th>Movimientos</th></tr></thead><tbody id='tablaConceptos_cuerpo'></tbody>";
	for (let index = 0; index < vResulsetServidor.length; index++) {
		//alert(vResulsetServidor[index].asiento+" "+vResulsetServidor[index].concepto+" "+vResulsetServidor[index].fecha);
		//insertar en las tabla
		var fila = tabla.insertRow(1);
		fila.setAttribute("class", "filaComprobante");
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		celda1.innerHTML = vResulsetServidor[index].asiento;
		celda2.innerHTML = vResulsetServidor[index].concepto;
		celda3.innerHTML = vResulsetServidor[index].fecha;
		celda4.innerHTML = "<button class='btn btn-success' onclick='sacarmovimientos(this.firstChild)' type='button'><span hidden class='idConcepto'>"+
		vResulsetServidor[index].id+"</span>VER MOVIMIENTOS</button>";
	}
}

function sacarmovimientos(vElement)
{
	var idComprobante = vElement.innerText;
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/vistaComprobantesController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//alert(this.responseText);
			var objeto = JSON.parse(this.responseText);
			mostrarMovimientos(objeto);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idComp=" + idComprobante+ "&parametro=" + "mostrarMovimientos");

}

function mostrarMovimientos(vResulsetServidor)
{
	$('#modalMovimientosComprobante').modal('show');
	var tabla = document.getElementById('tablaMovimientos');
	//limpia la tabla antes de mostrar los movimientos
	tabla.innerHTML='<thead class="thead-light"><tr><th>Código Cuenta</th><th>Nombre Cuenta</th><th>Parcial</th><th>Debe</th><th>Haber</th></tr></thead><tbody></tbody>';
	//insertar en la tabla
	for (let index = 0; index < vResulsetServidor.length; index++) {
		var fila = tabla.insertRow(1);
		fila.setAttribute("class", "filaMovimiento");
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);
		celda1.innerHTML = vResulsetServidor[index].codigo;
		celda2.innerHTML = vResulsetServidor[index].cuenta;
		celda3.innerHTML = vResulsetServidor[index].parcial;
		celda4.innerHTML = vResulsetServidor[index].debe;
		celda5.innerHTML = vResulsetServidor[index].haber;
	}
}

function sacarSaldosMes()
{
	var idCooperativa, mesSeleccionado, lista;
	idCooperativa = document.getElementById("idCooperativa_Ingreso").value;
	lista = document.getElementById("selectorMesReportes");
	mesSeleccionado = lista.options[lista.selectedIndex].value;
	if(mesSeleccionado==0)
	{
		var fechaActual = new Date();
		mesSeleccionado = +fechaActual.getMonth() + 1;
	}
	ajax = AJAXObject();
	ajax.open("POST", "../controllers/vistaReportesController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			var objeto = JSON.parse(this.responseText);
			//console.log(JSON.stringify(objeto));
			mostrarSaldosMes(objeto);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("idcoop=" + idCooperativa + "&mes=" + mesSeleccionado + "&parametro=" + "mostrar");

}

function mostrarSaldosMes(vSaldos)
{
	var saldosCuentas,saldosGrupos;
	saldosCuentas = JSON.parse(vSaldos[0].padres);
	saldosGrupos = JSON.parse(vSaldos[0].grupos);
	var tabla = document.getElementById('tablaSaldosGrupos');
	tabla.innerHTML = '<thead class="thead-light"><tr><th>Grupo</th><th>Saldo del mes (expresado en Córdobas)</th></tr></thead><tbody></tbody>';

	// llenando tabla de saldos por grupos
	for (let index = 0; index < saldosGrupos.length; index++) {
		var fila = tabla.insertRow(1);
		fila.setAttribute("class", "filaSaldoGrupo");
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		celda1.innerHTML = saldosGrupos[index].GRUPO;
		celda2.innerHTML = saldosGrupos[index].saldo;
	}
	var tabla2 = document.getElementById('tablaSaldosCuentaMayor');
	tabla2.innerHTML = '<thead class="thead-light"><tr><th>Cuenta</th><th>Código</th><th>Saldo del mes (expresado en Córdobas)</th></tr></thead><tbody></tbody>';
	
	// llenando tabla de saldos por cuenta mayor
	for (let index = 0; index < saldosCuentas.length; index++) {
		var fila = tabla2.insertRow(1);
		fila.setAttribute("class", "filaSaldoGrupo");
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		celda1.innerHTML = saldosCuentas[index].descripcion;
		celda2.innerHTML = saldosCuentas[index].codigo;
		celda3.innerHTML = saldosCuentas[index].total;
	}
	//alert(listo);
}

//para los tabs de la interfaz
function openPage(pageName,elmnt,color) {
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