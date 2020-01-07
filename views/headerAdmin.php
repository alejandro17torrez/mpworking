<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/metisMenu.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/tabsforauxiliars.css">


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
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> MultiPro   </a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Cooperativa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addCoop"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="../views/cooperativas.php"><i class='fa fa-list-ol fa-fw'></i> Cooperativas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt fa-fw"></i> Catalogo <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addCuentas"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="../views/cuentas.php"><i class='fa fa-list-ol fa-fw'></i> Cuentas </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-repeat fa-fw"></i> Concepto<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addCps"><i class='fa fa-plus fa-fw'></i>Agregar</a>
                            </li>
                            <li>
                                <a href="../views/conceptos.php"><i class='fa fa-list-ol fa-fw'></i> Conceptos</a>
                            </li>
                        </ul>
                    </li>
                    <!--li>
                        <a href="#"><i class="fa fa-bank fa-fw"></i> Banco<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addBank"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="../views/banco.php"><i class='fa fa-list-ol fa-fw'></i> Bancos</a>
                            </li>
                        </ul>
                    </li-->
                    <li>
                        <a href="#"><i class="fa fa-male fa-fw"></i> Socio<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="addSoc"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="../views/socios.php"><i class='fa fa-list-ol fa-fw'></i> Socios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bell fa-fw"></i> Auxiliares<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../views/auxiliares.php" ><i class='fa fa-book fa-fw'></i> Panel auxiliar</a>
                            </li>                            
                            <li>
                                <a href="#" id="grupo"><i class='fa fa-plus fa-fw'></i> Grupos</a>
                            </li>
                            <li>
                                <a href="#" id="sgrupo"><i class='fa fa-plus fa-fw'></i> Subgrupos</a>
                            </li>
                            <li>
                                <a href="#" id="cargosadd"><i class='fa fa-plus fa-fw'></i> Cargos</a>
                            </li>
                            <li>
                                <a href="#" id="tipoadd"><i class='fa fa-plus fa-fw'></i> Tipo de cuenta</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bitbucket-square fa-fw"></i> detallesConceptos<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../views/cuentasCooperativas.php"><i class='fa fa-list-ol fa-fw'></i> Detalle cuentas</a>
                            </li>
                            <li>
                                <a href="#" id="addDc"><i class='fa fa-plus fa-fw'></i> Agregar Cuentas</a>
                            </li>
                            <li>
                                <a href="../views/amarreCuentasConcpetos.php"><i class='fa fa-list-ol fa-fw'></i> Cuentas - Conceptos</a>
                            </li>
                            <!--li>
                                <a href="#" id="addDcc"><i class='fa fa-plus fa-fw'></i> Agregar conceptos</a>
                            </li-->
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

    </nav>



</div>