
function mostrarForma(elemento, visibilidad)
{
    var myClasses = document.querySelectorAll(elemento),
        i = 0,
        l = myClasses.length;

    for (i; i < l; i++) {
        myClasses[i].style.visibility = visibilidad;
    }
}

function terceroSocio (tipoSocio,tipoTercero,dropdown)
{
    var lista=document.getElementById(dropdown);
    var opcion=lista.options[lista.selectedIndex].value;
    switch(opcion)
    {
        case 'Socio':
            {
                mostrarForma(tipoSocio, "visible");
                mostrarForma(tipoTercero, "hidden");
            }
            break;
        case 'Tercero':
            {
                mostrarForma(tipoTercero, "visible");
                mostrarForma(tipoSocio, "hidden");
            }
            break;
        default:
            {
                mostrarForma(tipoTercero, "hidden");
                mostrarForma(tipoSocio, "hidden");
            }
    }
}

function llenarTablaProductos()
{
    var cantidad=document.getElementById('cantidadProducto').value;
    var descripcion=document.getElementById('descripcionProducto').value;
    var unidad=document.getElementById('unidadMedidaProducto').value;
    var precioUnitario=document.getElementById('precioUnitarioProducto').value;
    //estos dos campos son clave, si están vacios no hay nada que hacer y se debe interrumpir el metodo
    if(cantidad==""||precioUnitario=="")
    {
        return;
    }
    var total=cantidad*precioUnitario;
    //insertar en las tabla
    var tabla=document.getElementById('tablaProductos');
    var fila = tabla.insertRow(1);
    //esto coloca un id único cada producto ingresado
    var id = new Date().getTime().toString();
    fila.setAttribute("id","producto"+id);
    var celda1 = fila.insertCell(0);
    var celda2 = fila.insertCell(1);
    var celda3 = fila.insertCell(2);
    var celda4 = fila.insertCell(3);
    var celda5 = fila.insertCell(4);
    celda1.innerHTML=cantidad;
    celda2.innerHTML=descripcion;
    celda3.innerHTML=unidad;
    celda4.innerHTML=precioUnitario;
    celda5.innerHTML=total;
    calcularSubTotal();
}

function calcularSubTotal()
{
    conteoFilas=document.getElementById("tablaProductos").rows.length;
    var iva=document.getElementById("IVA").value;
    var subtotal=0;
    //alert(iva);
    for(i=(+conteoFilas - 1);i>0;i--)
    {
        var ultimototal=document.getElementById("tablaProductos").rows[i].cells[4].innerHTML;
        subtotal = +ultimototal + +subtotal;
        //alert(subtotal);
    }
    document.getElementById("subtotalFactura").textContent= subtotal;
    if(iva==null||isNaN(iva))
    {
        document.getElementById("totalFactura").textContent= subtotal;
    }
    else
    {
        var total = +subtotal + +iva;
        //total = subtotal + (subtotal * iva);
        document.getElementById("totalFactura").textContent= total;
    }
    limpiarFactura()
}

function opcionBaucher()
{
    var lista=document.getElementById("cuentaAfectada");
    var opcion = lista.options[lista.selectedIndex].value;
    switch (opcion) {
        case "1102":
            {
                mostrarForma("#lblbaucher", "visible");
                mostrarForma("#BauncherIngreso", "visible");
                mostrarForma("#lblcuentasbancos", "visible");
                mostrarForma("#cuentasbancos", "visible");
            }
            break;
        default:
            {
                mostrarForma("#lblbaucher", "hidden");
                mostrarForma("#BauncherIngreso", "hidden");
                mostrarForma("#cuentasbancos", "hidden");
                mostrarForma("#lblcuentasbancos", "hidden");
            }
    }
}

function opcionBaucherEgreso()
{
    var lista=document.getElementById("cuentaAfectadae");
    var opcion = lista.options[lista.selectedIndex].value;
    switch (opcion) {
        case "1102":
            {
                mostrarForma("#lblbaucherE", "visible");
                mostrarForma("#BauncherEgreso", "visible");
                mostrarForma("#lblcuentasbancosE", "visible");
                mostrarForma("#cuentasbancose", "visible");
            }
            break;
        default:
            {
                mostrarForma("#lblbaucherE", "hidden");
                mostrarForma("#BauncherEgreso", "hidden");
                mostrarForma("#cuentasbancose", "hidden");
                mostrarForma("#lblcuentasbancosE", "hidden");
            }
    }
}


function opcionBaucherFact()
{
    var lista=document.getElementById("cuentaAdd");
    var opcion = lista.options[lista.selectedIndex].value;
    switch (opcion) {
        case "1102":
            {
                mostrarForma("#lblbaufact", "visible");
                mostrarForma("#BauncherFactura", "visible");
                mostrarForma("#lblcuentasbanfac", "visible");
                mostrarForma("#cuentasbankf", "visible");
            }
            break;
        default:
            {
                mostrarForma("#lblbaufact", "hidden");
                mostrarForma("#BauncherFactura", "hidden");
                mostrarForma("#lblcuentasbanfac", "hidden");
                mostrarForma("#cuentasbankf", "hidden");
            }
    }
}

//esta funcion se ejecuta al hacer click en el botón guardar
function botonGuardar(formulario) {
    switch (formulario) {
        case 'INGRESO':
            {
                ingreso();
            }
            break;
        case 'EGRESO':
            {
                egreso();
            }
            break;
        case 'FACTURA':
            {
                factura();
            }
            break;
        case 'CHEQUES':
            {
                cheque();
            }
            break;
        case 'RETIROS':
            {
                retiros();
            }
            break;
        default:
            {
                alert('meperdon as¿');
            }
            break;
    }
}

function ingreso()
{
    var recibo,cantidad,cantidadLetras,tipoMoneda,tipoIngreso,concepto,depto,municipio,esBaucher,fecha,nombre;
    recibo=document.getElementById('numeroReciboIngreso').value;
    cantidad=document.getElementById('CantidadIngreso').value;
    cantidadLetras=document.getElementById('cantidadLetraIngreso').value;
    tipoMoneda=document.getElementById('tipoMonedaIngreso').options[tipoMonedaIngreso.selectedIndex].text;
    tipoIngreso=document.getElementById('tipoIndividuoIngreso').options[tipoIndividuoIngreso.selectedIndex].value;
    esBaucher=document.getElementById('cuentaAfectada').options[cuentaAfectada.selectedIndex].value;
    concepto=document.getElementById('descripcionIngreso').value;
    depto=document.getElementById("departamentoIngreso").options[departamentoIngreso.selectedIndex].text;
    municipio=document.getElementById("municipioIngreso").options[municipioIngreso.selectedIndex].text;
    fecha=document.getElementById("FechaIngreso").value;
    //determina si es de un socio o de un tercero
    switch(tipoIngreso)
    {
        case '1':
        {
            nombre=document.getElementById('IngresoSocio').options[IngresoSocio.selectedIndex].text;
        }
        break;
        case '2':
        {
            nombre=document.getElementById('IngresoTercero').value;
        }
        break;
        default:
        {
            nombre = " ";
        }
        break;
    }
    if(esBaucher=='1')
    {
        var numeroBaucher=document.getElementById("BauncherIngreso").value;
        numeroBaucher = " (con numero de baucher " + numeroBaucher+")";
        concepto = concepto+numeroBaucher;
    }
    //hace visivle esa parte de la página
    mostrarForma("#resultados","visible");
    //esta parte ya escribe
    document.getElementById("nRecib").innerText=recibo;
    document.getElementById('recibiDe').innerText=nombre;
    document.getElementById("tipMon").innerText=tipoMoneda;
    document.getElementById("numeroMonto").innerText=cantidad;
    document.getElementById("montoLetras").innerText=cantidadLetras;
    document.getElementById("concepto").innerText=concepto;
    document.getElementById("Mun").innerText=municipio;
    document.getElementById("depto").innerText=depto;
    document.getElementById("date").innerText=fecha;
}

function egreso()
{
    var recibo,cantidad,cantidadLetras,tipoMoneda,tipoEgreso,concepto,depto,municipio,fecha,nombre,esBaucher;
    recibo=document.getElementById('numeroReciboEgreso').value;
    cantidad=document.getElementById('CantidadEgreso').value;
    cantidadLetras=document.getElementById('cantidadLetraEgreso').value;
    tipoMoneda=document.getElementById('tipoMonedaEgreso').options[tipoMonedaEgreso.selectedIndex].text;
    tipoEgreso=document.getElementById('tipoIndividuoEgreso').options[tipoIndividuoEgreso.selectedIndex].value;
    concepto=document.getElementById('descripcionEgreso').value;
    esBaucher=document.getElementById('cuentaAfectada').options[cuentaAfectada.selectedIndex].value;
    depto=document.getElementById("departamentoEgreso").options[departamentoEgreso.selectedIndex].text;
    municipio=document.getElementById("municipioEgreso").options[municipioEgreso.selectedIndex].text;
    fecha=document.getElementById("FechaEgreso").value;
    //determina si es de un socio o de un tercero
    switch(tipoEgreso)
    {
        case '1':
        {
            nombre=document.getElementById('EgresoSocio').options[EgresoSocio.selectedIndex].text;
        }
        break;
        case '2':
        {
            nombre=document.getElementById('EgresoTercero').value;
        }
        break;
        default:
        {
            nombre = " ";
        }
        break;
    }
    if(esBaucher=='1')
    {
        var numeroBaucher=document.getElementById("BauncherEgreso").value;
        numeroBaucher = " (con numero de baucher " + numeroBaucher+")";
        concepto = concepto+numeroBaucher;
    }
    //hace visivle esa parte de la página
    mostrarForma("#resultados","visible");
    //esta parte ya escribe
    document.getElementById("nRecib").innerText=recibo;
    document.getElementById('recibiDe').innerText=nombre;
    document.getElementById("tipMon").innerText=tipoMoneda;
    document.getElementById("numeroMonto").innerText=cantidad;
    document.getElementById("montoLetras").innerText=cantidadLetras;
    document.getElementById("concepto").innerText=concepto;
    document.getElementById("Mun").innerText=municipio;
    document.getElementById("depto").innerText=depto;
    document.getElementById("date").innerText=fecha;
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







function factura()
{
    var numeroFactura,tipoMoneda,fecha,nombreProveedor,numeroRUC,concepto,cantidad,subtotal,iva, tipopago, cuenta, baucher, idCoop;
    //numeroFactura=document.getElementById('numeroFactura').value;
    //tipoMoneda=document.getElementById("tipoMonedaEgreso").options[tipoMonedaEgreso.selectedIndex].text;
    //fecha=document.getElementById('fechaFactura').value;
    //nombreProveedor=document.getElementById('nombreProveedor').value;
    //numeroRUC=document.getElementById('rucProveedor').value;
    //concepto=document.getElementById('conceptoFactura').value;
    //cantidad=document.getElementById('totalFactura').textContent;
    //iva=document.getElementById('IVA').value;
    //subtotal=document.getElementById('subtotalFactura').textContent;
    //esto extrae solo los numeros del total Y DEL SUBTOTAL
    idCoop = document.frmAddFact.idfact.value;
    numeroFactura = document.frmAddFact.numeroFactura.value;
    tipoMoneda = document.frmAddFact.tipoMonedaEgreso.value;
    fecha = document.frmAddFact.fechaFactura.value;
    nombreProveedor = document.frmAddFact.nombreProveedor.value;
    numeroRUC = document.frmAddFact.rucProveedor.value;
    concepto = document.frmAddFact.conceptoFactura.value;
    tipopago = document.frmAddFact.cuentaAdd.value;
    subtotal = document.getElementById('subtotalFactura').textContent;


    if (tipopago == "110101") {
        cuenta = null;
        baucher = null;
    }
    else
    if(tipopago == "1102"){
        cuenta = document.frmAddFact.BauncherFactura.value;
        baucher = document.frmAddFact.cuentasbankf.value;
    }

    cantidad = document.getElementById('totalFactura').textContent;
    iva = document.getElementById('IVA').value;
    //tipopago = document.frmAddFact.tipoPago.value;
    agregar = "agregar";

    
    //alert(numeroFactura+" , "+tipoMoneda+" , "+fecha+" , "+nombreProveedor+" , "+numeroRUC+" , "+concepto+" , "+cantidad+" , "+tipopago+" , "+iva+" , "+agregar);
    
    /*
    cantidad=cantidad.replace(/\D/g,'');
    subtotal=subtotal.replace(/\D/g,'');
    if(iva==""||isNaN(iva))
    {
        cantidad =cantidad+" (impuesto al valor agregado ya incluido)";
    }
    else
    {
        cantidad=cantidad+" ,con un IVA de "+tipoMoneda+iva+" y un subtotal de "+tipoMoneda+subtotal;
    }
    */
    
    //hace visivle esa parte de la página
    mostrarForma("#resultados","visible");
    //escribe en la pagina
    /*
    document.getElementById("nRecib").innerText=numeroFactura;
    document.getElementById("nFactura").innerText=numeroFactura;
    document.getElementById('recibiDe').innerText=nombreProveedor;
    document.getElementById("tipMon").innerText=tipoMoneda;
    document.getElementById("numeroMonto").innerText=cantidad;
    document.getElementById("concepto").innerText=concepto;
    document.getElementById("date").innerText=fecha;
    document.getElementById('numRuc').innerText=numeroRUC;
    */
	//esto toma la tablaProductos y la convierte en un objeto JavaScript
	var productosObj = $('#tablaProductos tr:has(td)').map(function(i, v) {
    var $td =  $('td', this);
        return {    
                 id: ++i,
                 cantidad: $td.eq(0).text(),
                 descripcion: $td.eq(1).text(),
                 unidadMedida: $td.eq(2).text(),
				 precioUnitario: $td.eq(3).text(),
				 total: $td.eq(4).text(),
               }
}).get();
    //alert(JSON.stringify(productosObj));

    var x = JSON.stringify(productosObj);

    alert(numeroFactura+" , "+idCoop+" , "+tipoMoneda+" , "+fecha+" , "+nombreProveedor+" , "+numeroRUC+" , "+concepto+" , "+cantidad+" , "+subtotal+" , "+tipopago+" , "+cuenta+" , "+baucher+" , "+iva+" , "+x+" , "+agregar);

    
    ajax = AJAXObject();
	ajax.open("POST", "../controllers/facturaController.php", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			alert('Cuenta agregada exitosamente');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("numeroFactura=" + numeroFactura + "&idCoop=" +idCoop+ "&tipoMoneda=" + tipoMoneda + "&fecha=" + fecha + "&nombreProveedor=" + nombreProveedor + "&numeroRUC=" + numeroRUC + "&concepto=" + concepto + "&cantidad=" + cantidad + "&subtotal=" +subtotal+ "&tipopago=" + tipopago + "&cuenta=" + cuenta + "&baucher=" + baucher + "&iva=" + iva + "&x=" + x + "&add=" + agregar);
    

}

function cheque()
{
    var numeroCheque,nombre,cantida,cantidadLetras,tipoMoneda,concepto,dept,mun,fecha;
    numeroCheque=document.getElementById('numeroCheque').value;
    nombre=document.getElementById('pagueseCheque').value;
    cantida=document.getElementById('cantidadCheque').value;
    cantidadLetras=document.getElementById('cantidadLetrasCheque').value;
    tipoMoneda=document.getElementById('monedaCheque').options[monedaCheque.selectedIndex].text;
    concepto=document.getElementById('descripcionCheque').value;
    tipoMoneda=document.getElementById('monedaCheque').options[monedaCheque.selectedIndex].text;
    dept=document.getElementById('departamentoCheque').options[departamentoCheque.selectedIndex].text;
    mun=document.getElementById('municipioCheque').options[municipioCheque.selectedIndex].text;
    fecha=document.getElementById('fechaCheque').value;
    //resultados visibles
    mostrarForma("#resultados","visible");
    //escribe en la pagina
    document.getElementById('nRecib').innerText=numeroCheque;
    document.getElementById('recibiDe').innerText=nombre;
    document.getElementById('tipMon').innerText=tipoMoneda;
    document.getElementById('numeroMonto').innerText=cantida;
    document.getElementById('montoLetras').innerText=cantidadLetras
    document.getElementById('nCheque').innerText=numeroCheque;
    document.getElementById('concepto').innerText=concepto;
    document.getElementById('Mun').innerText=mun;
    document.getElementById('depto').innerText=dept;
    document.getElementById('date').innerText=fecha;
}

function retiros()
{
    var nombre,tipoMoneda,monto,concepto,fecha;
    nombre=document.getElementById('nombreRetiro').value;
    tipoMoneda=document.getElementById('monedaRetiro').options[monedaRetiro.selectedIndex].text;
    monto=document.getElementById('montoRetiro').value;
    concepto=document.getElementById('selectorMotivo').options[selectorMotivo.selectedIndex].text;
    fecha=document.getElementById('fechaRetiro').value;
    //resultados visibles
    mostrarForma("#resultados","visible");
    //escribe en la pagina
    document.getElementById('recibiDe').innerText=nombre;
    document.getElementById('tipMon').innerText=tipoMoneda;
    document.getElementById('numeroMonto').innerText=monto;
    document.getElementById('concepto').innerText=concepto;
    document.getElementById('date').innerText=fecha;
}
//recarga la página
function recargar()
{
    alert("ENVIADO!!");
    document.location.reload(true);
}

function addDescripcion(campoDescripcion,nombreTercero,nombreSocio,tipoNombre,selectorDescripcion,formulario)
{
    var nombre,tipoNom,desc,lista;
    //esto determina de donde saca el nombre la funcion
    if(formulario=="FACTURA")
    {
        var ruc=document.getElementById('rucProveedor').value;
        nombre=document.getElementById(nombreTercero).value
        //se incluye el numero ruc como parte del nombre
        nombre=nombre+" identificado con el número RUC "+ruc;
        //acá tipoNombre almacena el numero de factura
        tipoNombre=document.getElementById("numeroFactura").value;
    }
    else if (formulario=="CHEQUE"){
        nombre=document.getElementById(nombreTercero).value;
    }
    else {
        lista = document.getElementById(tipoNombre);
        tipoNom = lista.options[lista.selectedIndex].value;
        switch (tipoNom) {
            case '1':
                {
                    lista = document.getElementById(nombreSocio);
                    nombre = lista.options[lista.selectedIndex].text;
                }
                break;
            case '2':
                {
                    nombre = document.getElementById(nombreTercero).value;
                }
                break;
            //para que no se trunque la funcion, inicializa en espacio si no cae en ninguna condicion
            default:
                {
                    nombre = " ";
                }
                break;
        }
    }
    
    //coje el concepto que se seleccionó
    lista=document.getElementById(selectorDescripcion);
    desc=lista.options[lista.selectedIndex].text;
    var descrip=document.getElementById(campoDescripcion);
    switch (desc)
    {
        case 'Aporte de ahorro para compra de terreno':
        {
            descrip.value="Aporte de ahorro para compra de terreno por "+nombre;
        }
        break;
        case 'Aporte para gastos administrativos':
        {
            descrip.value="Aporte para los gastos administrativos por "+nombre;
        }
        break;
        case 'Pago de impuestos':
        {
            descrip.value="Pago de impuestos por ";
        }
        break;
        case 'Papeleria y útiles de oficina':
        {
            descrip.value="Compra de papeleria y útiles de oficina ";
            if(formulario=="FACTURA")
            {
                //acá tipoNombre actua como el numero de factura
                descrip.value="Compra de papeleria y utiles de oficina a "+nombre+" con el numero de factura "+tipoNombre;
            }
        }
        break;
        case 'Gestiones legales':
        {
            descrip.value="Pago de honorarios a "+nombre+" por ";
        }
        break;
        case 'Devolución de aportes':
        {
            descrip.value="Devolucion de aportes dados por "+nombre;
        }
        break;
        case 'Viáticos':
        {
            descrip.value="Pago de víaticos a "+nombre+" por ";
        }
        break;
        case 'Transporte':
        {
            descrip.value="Pago de gastos de transporte a "+nombre+" por ";
        }
        break;
        case 'Mejoras a terrenos':
        {
            descrip.value="Pago a "+nombre+" por mejora en el terreno ";
            if(formulario=="FACTURA")
            {
                //acá tipoNOmbre actua como el numero de factura
                descrip.value="Compra para mejoras a terrenos a "+nombre+" con el numero de factura "+tipoNombre;
            }
        }
        break;
        case 'Mejoras a edificios':
        {
            descrip.value="Pago a "+nombre+" por mejora en el edificio ";
            if(formulario=="FACTURA")
            {
                //acá tipoNombre actua como el número de factura
                descrip.value="Compra para mejoras de edificios a "+nombre+" con el numero de factura "+tipoNombre;
            }
        }
        break;
        case 'Eventos':
        {
            descrip.value="Pago de evento en ocasión de ";
            if(formulario=="FACTURA")
            {
                //acá tipoNombre actua como el numero de factura
                descrip.value="Compra para evento en ocasión de  a "+nombre+" con el numero de factura "+tipoNombre;
            }
        }
        break;
        case 'Festividades':
        {
            descrip.value="Pago de festividad por motivo de "
            if(formulario=="FACTURA")
            {
                //acá tipoNOmbre actua como el numero de factura
                descrip.value="Compra para la festividad de  a "+nombre+" con el numero de factura "+tipoNombre;
            }
        }
        break;
        case 'Ofrendas funebres':
        {
            descrip.value="Pago de honras funebres de ";
        }
        break;
        case 'Donaciones':
        {
            descrip.value="Donativo de "+nombre+" en concepto de ";
        }
        break;
        case 'ANULAR RECIBO':
        {
            //acá se pone el codigo que muestra el id del dialogo de anular
            $('#confirmarAnular').modal("show");
        }
        break;
        default:
        {
            descrip.value="";
        }
    }
    descrip.focus();
}

/*IMPORTANTE

TODA FUNCIÓN APARTIR DE ACÁ PUEDE DEPENDER DE JQUERY, JQUERY ES UNA PORONGA ATÓMICA PERO
ES UNA DEPENDENCIA DEL BOOTSTRAP Y DEBE INCLUIRSE
*/
function desactivarForm(forma,numeroRecibo,boton,modal)
{
    //desabilita todo en el form
    $(forma+" :input").prop("disabled", true);
    //setea las entradas de texto para quedigan anulado
    $(forma).find('input:text').val("ANULADO");
    //ocultarmodel
    $(modal).modal("hide");
    //esto rehabilita los para el numero de recibo y botón guardar
    $(numeroRecibo).prop("disabled", false);
    $(boton).prop("disabled", false);
    $(forma).find('textarea').val("RECIBO ANULADO");
    
}

function borrar() {
    //esta funcion toma todas las filas con la clase que selecciona los prODCUTOS
	var d = document.getElementsByClassName("productoSeleccinado");
	while (d.length)
  {
  	d[0].parentElement.removeChild(d[0]);
  }
  $('#confirmarBorrar').modal("hide");
}

function editarProducto(celda) {
    var fila= celda.parentNode;
    //alert(fila);
    var cantidad,descripcion,unidadMedida,precioUnitario;
    cantidad=fila.cells[0].innerText;
    descripcion=fila.cells[1].innerText;
    unidadMedida=fila.cells[2].innerText;
    precioUnitario=fila.cells[3].innerText;
    document.getElementById('cantidadProducto').value=cantidad;
    document.getElementById('descripcionProducto').value=descripcion;
    document.getElementById('unidadMedidaProducto').value=unidadMedida;
    document.getElementById('precioUnitarioProducto').value=precioUnitario;
    fila.parentElement.parentElement.deleteRow(fila.rowIndex);
}

function limpiarFactura(){
    document.getElementById('cantidadProducto').value="";
    document.getElementById('descripcionProducto').value="";
    document.getElementById('unidadMedidaProducto').value="";
    document.getElementById('precioUnitarioProducto').value="";
}