<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../interfaz_cierres_cuentas/css/bootstrap.min.css">
    <!--css de la biblioteca bootstrap select-->
    <link rel="stylesheet" href="../interfaz_cierres_cuentas/css/bootstrap-select.css">
    <!--css propio-->
    <link rel="stylesheet" href="../interfaz_cierres_cuentas/css/style.css">
    <!--japascript de terceros para que la babosada funcione-->
    <script src="../interfaz_cierres_cuentas/js/jquery-3.3.1.slim.js"></script>
    <script src="../interfaz_cierres_cuentas/js/popper.min.js"></script>
    <script src="../interfaz_cierres_cuentas/js/bootstrap.min.js"></script>
    <!--Japascript de la bibioteca bootstrap select-->
    <script src="../interfaz_cierres_cuentas/js/bootstrap-select.js"></script>
    <script src="../interfaz_cierres_cuentas/js/i18n/defaults-es_ES.js"></script>
    <!--Mi propio japascript, espero que esta damier no se trunque, guau-->
    <script src="../interfaz_cierres_cuentas/js/Japascript.js"></script>
    <title>Balanza de comprobacion</title>
</head>

<body>
    <div>
        <form method="post" id="forma" class="forma" action="">
            <h2 class="centrar">ACTIVOS</h2>
            <!-- este div se puede generar por javascript por tantas cuentas hubiere en el catalogo -->
            <div class="form-group col-sm-6 activos">
                <label for="cuentaGeneral">(Nombre de cuenta mayor)</label>
                <input id="cuentaGeneral" class="form-control" type="text" name="">
            </div>
            <h2 class="centrar">PASIVOS</h2>
            <!-- este div se puede generar por javascript por tantas cuentas hubiere en el catalogo -->
            <div class="form-group col-sm-6 pasivos">
                <label for="cuentaGeneral">(Nombre de cuenta mayor)</label>
                <input id="cuentaGeneral" class="form-control" type="text" name="">
            </div>
            <h2 class="centrar">Resumen</h2>
            <div class="form-group col-sm-6 resumen">
                <label id="etiquetaCapital">Capital a la fecha de corte (en Córdobas): <span
                        id="totalCapital"></span></label>
                <br>
                <label id="etiquetaMonto">Monto a la fecha de corte (en Córdobas): <span id="totalMonto"></span></label>
            </div>
        </form>
    </div>
</body>

</html>