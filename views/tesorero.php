<?php

require "conexion/conexion.php";
$conexion = new Conexion();
$enlace = $conexion->Conectar();
$combocoop = null;
$combocoopI = null;
$comboConceptosposi = null;
$comboConceptosnega = null;
$comboConceptosposifactura = null;
$comboBanco = null;

$usuario = $user->id;

$data = [

    'id' => $usuario,
];

$sql = "SELECT * FROM `socios` WHERE cooperativa_id = :id";
$x = $enlace->prepare($sql);
$x->execute($data);
$opciones = $x->fetchAll(PDO::FETCH_ASSOC);
foreach ($opciones as $op) 
{
    $combocoop .= "<option value='".$op['nombreI']."'>".$op['nombreI']." ".$op['apellidoI']."</option>";
}

$sqlI = "SELECT cc.id, cop.concepto FROM cuentas_conceptos cc, conceptos cop, cuentas_cooperativas coo, catalogo caa 
WHERE cc.conceptos = cop.id AND coo.id = cc.cuentas_coop AND coo.cuenta = caa.id 
AND coo.cooperativa = :id AND cc.signo = '-'  
AND (NOT caa.codigo LIKE '%1101%') AND (NOT caa.codigo LIKE '%1102%')";
$xI = $enlace->prepare($sqlI);
$xI->execute($data);
$opcionesI = $xI->fetchAll(PDO::FETCH_ASSOC);
foreach ($opcionesI as $opI) 
{
    $comboConceptosnega .= "<option value='".$opI['id']."'>".$opI['concepto']."</option>";
}


$sqlII = "SELECT cc.id, cop.concepto FROM cuentas_conceptos cc, conceptos cop, cuentas_cooperativas coo, catalogo caa 
WHERE cc.conceptos = cop.id AND coo.id = cc.cuentas_coop AND coo.cuenta = caa.id 
AND coo.cooperativa = :id AND cc.signo = '+'  
AND (NOT caa.codigo LIKE '%1101%') AND (NOT caa.codigo LIKE '%1102%')";
$xII = $enlace->prepare($sqlII);
$xII->execute($data);
$opcionesII = $xII->fetchAll(PDO::FETCH_ASSOC);
foreach ($opcionesII as $opII) 
{
    $comboConceptosposi .= "<option value='".$opII['id']."'>".$opII['concepto']."</option>";
    $comboConceptosposifactura .= "<option value='".$opII['id']."'>".$opII['concepto']."</option>";
}

$banco = "SELECT cc.id, caa.cuenta, cc.descripcion 
FROM cuentas_cooperativas cc, catalogo caa 
WHERE cc.cuenta = caa.id AND cc.cooperativa = :id AND caa.codigo LIKE '%1102%' AND cc.descripcion != '' ";
$query = $enlace->prepare($banco);
$query->execute($data);
$opcionesIII = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($opcionesIII as $opIII) 
{
    $comboBanco .= "<option value='".$opIII['descripcion']."'>".$opIII['descripcion']."</option>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/productos.css">


</head>
<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Multipro R.L</a>
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $user->getNombre(); ?> </a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Documentos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addri"><i class='fa fa-list-ul fa-fw'></i> Recibo ingreso</a>
                            </li>
                            <li>
                                <a href="#" id="addre"><i class='fa fa-list-ul fa-fw'></i> Recibo egreso</a>
                            </li>
                            <li>
                                <a href="#" id="addch"><i class='fa fa-list-alt fa-fw'></i> Cheques</a>
                            </li>
                            <li>
                                <a href="#" id="addfac"><i class='fa fa-list-alt fa-fw'></i> Facturas</a>
                            </li>
                            <!-- <li>
                                <a href="#" id="addfas"><i class='fa fa-list-alt fa-fw'></i> Retiros </a>
                            </li>
                            <li>
                                <a href="#" id="addret"><i class='fa fa-list-ol fa-fw'></i> Retenciones</a>
                            </li-->
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt fa-fw"></i> Balance General <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="./balance.php"><i class='fa fa-list-ol fa-fw'></i> Ver </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-repeat fa-fw"></i> Estado de resultados<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="./resultados.php"><i class='fa fa-list-ol fa-fw'></i> Ver </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>

    </nav>



</div>

<body>

    <div id="page-wrapper">
        <button class="tablink" onclick="openPage('comprobantes', this, 'rgb(243, 157, 86)')" id="defaultOpen">Comprobantes de Diario</button>
        <button class="tablink" onclick="openPage('reportes_saldos', this, 'rgb(152, 196, 152)')">Registros de saldos</button>


        <div id="comprobantes" class="tabcontent">
            <div id="cuerpoPagina">
                <form method="get" action="" class="forma">
                    <div class="col-sm-6">
                        <label for="selectorMes">Seleccione Mes</label>
                        <select class="form-control" id="selectorMes" onchange="sacarComprobantesDiario()">
                            <option value="0">MOSTRAR TODOS</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <table class="table table-light" id="tablaConceptos">
                        <thead>
                            <tr>
                                <th>Numero de Asiento</th>
                                <th>Concepto</th>
                                <th>Fecha</th>
                                <th>Movimientos</th>
                            </tr>
                        </thead>
                        <tbody id="tablaConceptos_cuerpo">

                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div id="reportes_saldos" class="tabcontent">
            <form action="" class="forma">
                <div class="col-sm-6">
                    <label for="selectorMesReportes">Seleccione Mes</label>
                    <select class="form-control" id="selectorMesReportes" onchange="sacarSaldosMes()">
                        <option value="0">MES ACTUAL</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
    <br>
    <br>
    <br>
    <br>
                <label for="tablaSaldosGrupos">Saldos del mes por grupo de cuentas</label>
                    <table class="table table-light" id="tablaSaldosGrupos">
                        <thead class="thead-light">
                            <tr>
                                <th>Grupo</th>
                                <th>Saldo del mes (expresado en Córdobas)</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                <label for="tablaSaldosCuentaMayor">Saldos del mes por cuenta Mayor</label>
                    <table class="table table-light" id="tablaSaldosCuentaMayor">
                        <thead class="thead-light">
                            <tr>
                                <th>Cuenta</th>
                                <th>Saldo del mes (expresado en Córdobas)</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </form>
        </div>
        



        <!-- Modales para agregar -->
        <div class="modal fade" tabindex="-1" role="dialog" id="Addri">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCps">
                            <form id="ingreso" role="form" class="" name="frmAddRi">
                                <h2 class="centrar">Recibo de Ingreso</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idCooperativa_Ingreso" name="idfi" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="fecha">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroReciboIngreso">Recibo número:</label>
                                    <input id="numeroReciboIngreso" name="numeroReciboIngreso" class="form-control"
                                        type="text" placeholder="Ingrese el número del recibo">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="tipoIndividuoIngreso">Tipo de individuo:</label>
                                    <select class="form-control" id="tipoIndividuoIngreso" name="tipoIndividuoIngreso"
                                        onchange="terceroSocio('#contenedorIngresoSocio','#IngresoTercero','tipoIndividuoIngreso')">
                                        <option value="0">Seleccione si es un socio o un tercero</option>
                                        <option value="Socio">Socio</option>
                                        <option value="Tercero">Tercero</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="IngresoTercero">Recibi de:</label>
                                    <input class="form-control form-check-input esconder" id="IngresoTercero"
                                        placeholder="Ingrese nombre">
                                    <div id="contenedorIngresoSocio" class="esconder">
                                        <select class="form-control form-check-input" id="IngresoSocio"
                                            name="IngresoSocio" data-live-search="true">
                                            <?php echo $combocoop; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="tipoMonedaIngreso">Tipo de moneda:</label>
                                    <select class="form-control" id="tipoMonedaIngreso" name="tipoMonedaIngreso">
                                        <option value="C$">C$</option>
                                        <option value="$">$</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="CantidadIngreso">Ingrese Cantidad en numeros</label>
                                    <input id="CantidadIngreso" name="CantidadIngreso" class="form-control"
                                        placeholder="Ingrese cantidad">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cantidadLetraIngreso">Ingrese cantidad en letras:</label>
                                    <input class="form-control" id="cantidadLetraIngreso" type="text"
                                        name="cantidadLetraIngreso" placeholder="Ingrese la cantidad en letras">
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label for="TconceptoIngreso">En concepto de:</label>
                                    <select class="form-control" id="Cconcepto" name="Cconcepto"
                                        onchange="addDescripcion('descripcionIngreso','IngresoTercero','IngresoSocio','tipoIndividuoIngreso','Cconcepto','INGRESO')">
                                        <?php echo $comboConceptosnega; ?>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cuentaAfectada">Seleccione la forma de pago</label>
                                    <select id="cuentaAfectada" name="cuentaAfectada" class="form-control"
                                        onchange="opcionBaucher()">
                                        <option value="110101">Pago directo al tesorero</option>
                                        <option value="1102">Pago con Baucher</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12 esconder">
                                    <label id="lblbaucher" for="BauncherIngreso">No Baucher:</label>
                                    <input class="form-control" id="BauncherIngreso" name="BauncherIngreso"
                                        placeholder="Digite numero Baucher">
                                    <label id="lblcuentasbancos" for="cuentasbancos">Cuentas disponibles:</label>
                                    <select id="cuentasbancos" name="cuentasbancos" class="form-control">
                                        <?php echo $comboBanco; ?>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12" id="lugarIngreso" name="lugarIngreso">
                                    <label for="lugar">Lugar:</label>
                                    <select class="form-control" id="departamentoIngreso" name="departamentoIngreso">
                                        <option value="0">Seleccione departamento</option>
                                        <option value="MATAGALPA">MATAGALPA</option>
                                    </select>
                                    <select class="form-control" id="municipioIngreso" name="municipioIngreso">
                                        <option value="0">Seleccione municipio</option>
                                        <option value="Matagalpa">Matagalpa</option>
                                        <option value="La Dalia">La Dalia</option>
                                        <option value="Esquipulas">Esquipulas</option>
                                        <option value="San Dionisio">San Dionisio</option>
                                        <option value="Sébaco">Sébaco</option>
                                        <option value="Ciudad Darío">Ciudad Darío</option>
                                    </select>
                                </div>
                                <div class=" ">
                                    <button type="button" class="btn btn-primary" onclick="agregarRi()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer ">
                            <p>Llene todos los campos debido a que son requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" tabindex="-1" role="dialog" id="Addre">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCps">
                            <form id="egreso" role="form" class="" name="frmAddRe">
                                <h2 class="centrar">Recibo de Egreso</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idCooperativa_Egreso" name="idcoopre" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label id="fechare" for="fechare">Fecha:</label>
                                    <input class="form-control" type="date" id="fechare" name="fechare">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroReciboEgreso">Recibo número:</label>
                                    <input id="numeroReciboEgreso" name="numeroReciboEgreso" class="form-control"
                                        type="text" placeholder="Ingrese el número del recibo">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="tipoIndividuoEgreso">Tipo de individuo:</label>
                                    <select class=" form-control" id="tipoIndividuoEgreso" name="tipoIndividuoEgreso"
                                        onchange="terceroSocio('#contenedorEgresoSocio','#EgresoTercero','tipoIndividuoEgreso')">
                                        <option value="0">Seleccione si es un Egreso socio o un tercero</option>
                                        <option value="Socio">Socio</option>
                                        <option value="Tercero">Tercero</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="EgresoTercero">Paguese a:</label>
                                    <input class="form-control form-check-input esconder" id="EgresoTercero"
                                        name="EgresoTercero" placeholder="Ingrese nombre">
                                    <div id="contenedorEgresoSocio" class="esconder">
                                        <select class="form-control form-check-input " id="EgresoSocio"
                                            name="EgresoSocio" data-live-search="true">
                                            <?php echo $combocoop; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="tipoMonedaEgreso">Tipo de moneda:</label>
                                    <select class="form-control" id="tipoMonedaEgreso" name="tipoMonedaEgreso">
                                        <option value="C$">C$</option>
                                        <option value="$">$</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="CantidadEgreso">Ingrese Cantidad en numeros</label>
                                    <input id="CantidadEgreso" name="CantidadEgreso" class="form-control"
                                        placeholder="Ingrese cantidad">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cantidadLetraEgreso">Ingrese cantidad en letras:</label>
                                    <input class="form-control" id="cantidadLetraEgreso" name="cantidadLetraEgreso"
                                        type="text" placeholder="Ingrese la cantidad en letras">
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label for="Cconceptoe">En concepto de:</label>
                                    <select class="form-control" id="Cconceptoe" name="Cconceptoe">
                                        <?php echo $comboConceptosposi; ?>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cuentaAfectada">Seleccione la forma de pago</label>
                                    <select id="cuentaAfectadae" name="cuentaAfectada" class="form-control"
                                        onchange="opcionBaucherEgreso()">
                                        <option value="110101">Pago a CAJA</option>
                                        <option value="1102">Pago a BANCO</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12 esconder">
                                    <label id="lblbaucherE" for="BauncherEgreso">No Baucher:</label>
                                    <input class="form-control form-check-input" id="BauncherEgreso"
                                        name="BauncherEgreso" placeholder="Digite numero Baucher">
                                    <label id="lblcuentasbancosE" for="cuentasbancose">Cuentas disponibles:</label>
                                    <select id="cuentasbancose" name="cuentasbancose" class="form-control">
                                        <?php echo $comboBanco; ?>
                                    </select>
                                </div>


                                <div class="form-group label-floating col-sm-12" id="lugarIngreso">
                                    <label for="lugar">Lugar:</label>
                                    <select class="form-control" id="departamentoEgreso" name="departamentoEgreso">
                                        <option value="0">Seleccione departamento</option>
                                        <option value="MATAGALPA">MATAGALPA</option>
                                    </select>
                                    <select class="form-control" id="municipioEgreso" name="municipioEgreso">
                                        <option value="0">Seleccione municipio</option>
                                        <option value="Matagalpa">Matagalpa</option>
                                        <option value="La Dalia">La Dalia</option>
                                        <option value="Esquipulas">Esquipulas</option>
                                        <option value="San Dionisio">San Dionisio</option>
                                        <option value="Sébaco">Sébaco</option>
                                        <option value="Ciudad Darío">Ciudad Darío</option>
                                    </select>
                                </div>
                                <div class=" ">
                                    <button type="button" class="btn btn-primary" onclick="agregarRe()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer ">
                            <p>Llene todos los campos debido a que son requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="Reti">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCps">
                            <form class="forma" role="form" name="frmAddReti">
                                <h2 class="centrar">Minutas de retiro</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idfi" name="idfi" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="fechaRetiro">Fecha del retiro:</label>
                                    <input id="fechaRetiro" name="fechaRetiro" class="form-control" type="date">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="nombreRetiro">Retiro hecho por:</label>
                                    <input id="nombreRetiro" name="fechaRetiro" class="form-control"
                                        placeholder="Digite el nombre de quien efectuó el retiro" type="text">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="monedaRetiro">Tipo de moneda:</label>
                                    <select id="monedaRetiro" class="form-control">
                                        <option value="0">C$</option>
                                        <option value="1">U$</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="montoRetiro">Monto</label>
                                    <input id="montoRetiro" class="form-control" type="text">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="selectorMotivo">Motivo:</label>
                                    <select id="selectorMotivo" class="form-control">
                                        <option value="">Gastos varios</option>
                                        <option value="">Cancelación de socio</option>
                                        <option value="">Otros motivos</option>
                                    </select>
                                </div>
                                <div class=" ">
                                    <button type="button" class="btn btn-primary" onclick="agregarSocios()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer ">
                            <p>Llene todos los campos debido a que son requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        

        <div class="modal fade" tabindex="-1" role="dialog" id="Reten">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCps">
                            <form class="forma" role="form" name="frmAddReten">
                                <h2 class="centrar">Constancia de retención</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idfi" name="idfi" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="nombreRetenido">Nombre del retenido</label>
                                    <input id="nombreRetenido" class="form-control" type="text"
                                        placeholder="Escriba el nombre de a quien se le retiene">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="direccionRetenido">Dirección</label>
                                    <input id="direccionRetenido" class="form-control" type="text"
                                        placeholder="Escriba la dirección completa">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="rucRetenido">RUC:</label>
                                    <input id="rucRetenido" class="form-control" type="text"
                                        placeholder="Escriba el número RUC">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroFactura">Numero Factura</label>
                                    <input id="numeroFactura" class="form-control" type="text"
                                        placeholder="Escriba el número de la factura">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="valorRetencion">Valor retenido</label>
                                    <input id="valorRetencion" class="form-control" type="text"
                                        placeholder="Digite el valor de la retención">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="conceptoRetencion">Concepto</label>
                                    <input id="conceptoRetencion" class="form-control" type="text">
                                </div>
                                <div class="form-group label-floating col-sm-12" id="lugarIngreso">
                                    <label for="departamentoRetencion">Lugar:</label>
                                    <select class="form-control" id="departamentoRetencion">
                                        <option value="0">Seleccione departamento</option>
                                        <option value="1">MATAGALPA</option>
                                    </select>
                                    <select class="form-control" id="municipioRetencion">
                                        <option value="0">Seleccione municipio</option>
                                        <option value="1">Matagalpa</option>
                                        <option value="2">La Dalia</option>
                                        <option value="3">Esquipulas</option>
                                        <option value="4">San Dionisio</option>
                                        <option value="5">Sébaco</option>
                                        <option value="6">Ciudad Darío</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="fechaRetencion">Fecha</label>
                                    <input id="fechaRetencion" class="form-control" type="date">
                                </div>
                                <div class=" ">
                                    <button type="button" class="btn btn-primary" onclick="agregarSocios()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer ">
                            <p>Llene todos los campos debido a que son requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="Che">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCps">
                            <form class="forma" action="" method="get" id="cheques" name="frmAddChe">
                                <h2 class="centrar">Comprobante de cheque</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idcoopch" name="idcoopch" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroCuenta">Numero de cuenta bancaria</label>
                                    <select id="numeroCuenta" name="numeroCuenta" class="form-control">
                                        <?php echo $comboBanco;?>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroCheque">Numero de cheque</label>
                                    <input id="numeroCheque" name="numeroCheque" class="form-control" type="text"
                                        placeholder="Digite el número del chque">
                                </div>
                                <div class="form-group label-floating col-sm-12" id="lugarIngreso">
                                    <label for="departamentoCheque">Lugar:</label>
                                    <select class="form-control" id="departamentoCheque" name="departamentoCheque">
                                        <option value="0">Seleccione departamento</option>
                                        <option value="MATAGALPA">MATAGALPA</option>
                                    </select>
                                    <br>
                                    <select class="form-control" id="municipioCheque" name="municipioCheque">
                                        <option value="0">Seleccione municipio</option>
                                        <option value="Matagalpa">Matagalpa</option>
                                        <option value="La Dalia">La Dalia</option>
                                        <option value="Esquipulas">Esquipulas</option>
                                        <option value="San Dionisio">San Dionisio</option>
                                        <option value="Sébaco">Sébaco</option>
                                        <option value="Ciudad Darío">Ciudad Darío</option>
                                    </select>
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label for="fechaCheque">Fecha</label>
                                    <input id="fechaCheque" name="fechaCheque" class="form-control" type="date">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="pagueseCheque">Páguese a:</label>
                                    <input id="pagueseCheque" name="pagueseCheque" class="form-control" type="text"
                                        placeholder="Ingrese el nombre">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label>Tipo de moneda:</label>
                                    <select class="form-control" id="monedaCheque" name="monedaCheque">
                                        <option value="C$">C$</option>
                                        <option value="$">U$</option>
                                    </select>
                                    <label for="cantidadCheque">Monto del cheque (expresado en números)</label>
                                    <input type="number" class="form-control" id="cantidadCheque" name="cantidadCheque"
                                        placeholder="Digite la cantidad en números">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cantidadLetrasCheque">Cantidad (expresada en letras)</label>
                                    <input id="cantidadLetrasCheque" class="form-control" type="text"
                                        name="cantidadLetrasCheque" placeholder="Digite la cantidad en letras">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="conceptoCheque">En concepto de:</label>
                                    <select id="conceptoCheque" name="conceptoCheque" class="form-control">
                                        <?php echo $comboConceptosposi;?>
                                    </select>
                                    <br>
                                    <div class=" ">
                                        <button type="button" class="btn btn-primary" onclick="agregarCh()"
                                            data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                class="zmdi zmdi-delete"></i> Descartar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer ">
                            <p>Llene todos los campos debido a que son requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="Fact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Fact-title"></h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="forma">
                            <h2>FACTURAS</h2>
                            <form action="" name="frmAddFact">
                                <h3 class="centrar">Encabezado Factura</h3>
                                <div class="form-group label-floating col-sm-12">
                                    <input id="idfact" name="idfact" class="form-control" type="text"
                                        value="<?php echo $user->getId();?>" disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="numeroFactura">Factura numero:</label>
                                    <input id="numeroFactura" name="numeroFactura" class="form-control"
                                        placeholder="Ingrese el número de la factura" type="text">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="tipoMonedaEgreso">Tipo de moneda:</label>
                                    <select class="form-control" id="tipoMonedaEgreso" name="tipoMonedaEgreso">
                                        <option value="C$">C$</option>
                                        <option value="$">$</option>

                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="fechaFactura">Fecha</label>
                                    <input id="fechaFactura" name="fechaFactura" class="form-control" type="date">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="nombreProveedor">Proveedor:</label>
                                    <input id="nombreProveedor" name="nombreProveedor" class="form-control"
                                        placeholder="Ingrese el nombre del negocio" type="text">
                                    <label for="rucProveedor">Numero RUC:</label>
                                    <input type="text" name="rucProveedor" id="rucProveedor"
                                        placeholder="Ingrese el numero Ruc del negocio" class="form-control">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="conceptoFactura">Factura en concepto de:</label>
                                    <select id="conceptoFactura" name="conceptoFactura" class="form-control">
                                        <!--option value="-1">Seleccione el concepto</option>
                                        <option value="0">Papeleria y útiles de oficina</option>
                                        <option value="1">Mejoras a terrenos</option>
                                        <option value="2">Mejoras a edificios</option>
                                        <option value="3">Eventos</option>
                                        <option value="4">Festividades</option>
                                        <option value="5">Ofrendas funebres</option>
                                        <option value="6">Otros Conceptos</option-->
                                        <?php echo $comboConceptosposi; ?>
                                    </select>
                                    <!--textarea id="descripcionFactura" class="form-control texto" rows="4"
                                        placeholder="Seleccione un concepto y rellene la descripcion acá"></textarea-->
                                </div>

                                <!--div class="form-group label-floating col-sm-12">
                                    <label for="tipoPago">Tipo de Pago</label>
                                    <select id="tipoPago" name="tipoPago"  class="form-control">
                                        <option value="110101">Efectivo</option>
                                        <option value="1102">Transferencia</option>
                                        <option value="2">Cheque</option>
                                        <option value="3">Crédito</option>
                                    </select>
                                </div-->
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cuentaAdd">Seleccione la forma de pago</label>
                                    <select id="cuentaAdd" name="cuentaAdd" class="form-control"
                                        onchange="opcionBaucherFact()">
                                        <option value="110101">Efectivo</option>
                                        <option value="1102">Crédito</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-sm-12 esconder">
                                    <label id="lblbaufact" for="BauncherFactura">No Baucher:</label>
                                    <input class="form-control" id="BauncherFactura" name="BauncherFactura"
                                        placeholder="Digite numero Baucher">
                                    <label id="lblcuentasbanfac" for="cuentasbancos">Cuentas disponibles:</label>
                                    <select id="cuentasbankf" name="cuentasbankf" class="form-control">
                                        <?php echo $comboBanco; ?>
                                    </select>
                                </div>
                            </form>

                            <form action="" method="get">
                                <h3 class="centrar">Datos de productos</h3>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="cantidadProducto">Cantidad de producto</label>
                                    <input id="cantidadProducto" name="cantidadProducto" class="form-control"
                                        type="text" placeholder="Ingrese la cantidad de producto">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="descripcionProducto">Descripcion</label>
                                    <input id="descripcionProducto" name="descripcionProducto" class="form-control"
                                        type="text" placeholder="Ingrese la descripcion del producto">
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label for="unidadMedidaProducto">Unidad de medida</label>
                                    <input id="unidadMedidaProducto" name="unidadMedidaProducto" class="form-control"
                                        type="text" placeholder="Digite en la unidad en que se mide el producto">
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label for="precioUnitarioProducto">Precio Unitario</label>
                                    <input id="precioUnitarioProducto" name="precioUnitarioProducto"
                                        class="form-control" type="text"
                                        placeholder="Ingrese el precio por unidad del producto">
                                    <br>
                                    <button class="btn btn-primary" type="button"
                                        onclick="llenarTablaProductos()">Agregar Producto</button>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <table id="tablaProductos" class="table col-sm-10">
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Descripcion</th>
                                            <th>U.Medida</th>
                                            <th>P.Unit.</th>
                                            <th>Total</th>
                                        </tr>
                                    </table>
                                    <!--Este boton lanza un modal de bootstrap-->
                                    <button class="btn btn-danger botnELiminar" onclick="borrar()"
                                        type="button">Eliminar Seleccion</button>
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label id="subtotalFactura" name="subtotalFactura">(ACÁ IRIA EL SUBTOTAL)</label>
                                    <input class="form-control" type="text" id="IVA" name="iva"
                                        placeholder="Digite el IVA,si es indicado en la factura"
                                        onchange="calcularSubTotal()">
                                    <label id="totalFactura" name="totalFactura">(ACÁ IRIA EL TOTAL)</label>

                                    <button class="btn btn-primary" type="button"
                                        onclick="botonGuardar('FACTURA')">Guardar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>Llene todos los campos debido a que son requeridos</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para mostrar movimientos de un comprobante de diario -->
        <div id="modalMovimientosComprobante" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="my-modal-title">Movimientos del Comprobante</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-light" id="tablaMovimientos">
                            <thead class="thead-light">
                                <tr>
                                    <th>Código Cuenta</th>
                                    <th>Nombre Cuenta</th>
                                    <th>Parcial</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        //esta funcion usa delegacion de eventos para tomar las filas usando un solo evento en la tabla
        document.querySelector('#tablaProductos').addEventListener('click', function (event) {
            if (event.target.tagName.toLowerCase() === 'td') {
                var td = event.target;
                var fila = td.parentNode;
                fila.classList.toggle("productoSeleccinado");
            }
        });
        document.querySelector('#tablaProductos').addEventListener('dblclick', function (event) {
            if (event.target.tagName.toLowerCase() === 'td') {
                var td = event.target;
                editarProducto(td);
            }
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/sb-admin-2.js"></script>
    <!--script src="../js/jquery-1.12.3.js"></script-->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.bootstrap.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/tesoreros.js"></script>
    <script src="js/Japascript.js"></script>
</body>

</html>