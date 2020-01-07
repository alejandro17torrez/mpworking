<?php include('./headerAdmin.php'); ?>

<body>

    <?php 
    require "../conexion/conexion.php";
    $conexion = new Conexion();
	$enlace = $conexion->Conectar();
    $combocoop = null;
    $combocoopI = null;

	$sql = "SELECT * FROM `cooperativa`";
	$x = $enlace->prepare($sql);
	$x->execute();
	$opciones = $x->fetchAll(PDO::FETCH_ASSOC);
	foreach ($opciones as $op) 
	{
		$combocoop .= "<option value='".$op['id']."'>".$op['nombre_cooperativa']."</option>";
    }
    
    $sqlI = "SELECT * FROM `cargos`";
	$xI = $enlace->prepare($sqlI);
	$xI->execute();
	$opcionesI = $xI->fetchAll(PDO::FETCH_ASSOC);
	foreach ($opcionesI as $opI) 
	{
		$combocoopI .= "<option value='".$opI['id']."'>".$opI['desc']."</option>";
	}

?>


    <div id="page-wrapper">

        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-offset-2 col-sm-8">
                <h3 class="text-center"> <small class="mensaje"></small></h3>
            </div>
            <div class="table-responsive col-sm-12">
                <table id="dt_socios" class="table table-bordered table-hover" cellspacing="0" width="100%"
                    style="padd">
                    <thead>
                        <tr>
                            <th>Ier nombre</th>
                            <th>IIdo nombre</th>
                            <th>Ier apellido</th>
                            <th>IIdo apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th>Cedula</th>
                            <th>Cargos</th>
                            <th>Cooperativa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>



        <!-- Modal para agregar -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addsocios">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formSocios">
                            <form role="form" class="" id="Socios" name="frmAddSocios">
                                <h2 class="centrar">Agregar un nuevo socio</h2>

                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="nsocio">Ier Nombre del socio</label>
                                    <input id="nsocio" name="nsocio" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el primer nombre del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="nnsocio">IIdo Nombre del socio</label>
                                    <input id="nnsocio" name="nnsocio" type="text" class="form-control input-md"
                                        required="">
                                    <span class="help-block">Escriba el segundo nombre del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="asocio">Ier Apellido del socio</label>
                                    <input id="asocio" name="asocio" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el primer apellido del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="aasocio">IIer Apellido del socio</label>
                                    <input id="aasocio" name="aasocio" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el segundo apellido del socio</span>
                                </div>
                                
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="cesocio">Cedula</label>
                                    <input id="cesocio" name="cesocio" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba la cedula del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="fnsocio">Fecha de nacimiento</label>
                                    <input id="fnsocio" name="fnsocio" type="date" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba la fecha de nacimiento del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="ccoop">Cooperativa</label>
                                    <select id="ccoop" name="ccoop" class="form-control">
                                        <?php echo $combocoop; ?>
                                    </select>
                                    <span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                </div>

                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="car">Cargo</label>
                                    <select id="car" name="car" class="form-control">
                                        <?php echo $combocoopI; ?>
                                    </select>
                                    <span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                </div>

                                <div class=" ">
                                    <button type="button" class="btn btn-primary" onclick="agregarSocios()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p>Llene todos los campos debido a que son requeridos</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para editar cooperativas -->
        <div class="modal fade" tabindex="-1" role="dialog" id="SociosEditar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formSocios">
                            <form class="" id="SociosEdit" name="frmEditSocios">
                                <h2 class="centrar">Editar la cuentas</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idsocioe">ID</label>
                                    <input id="idsocioe" name="idsocioe" type="text" placeholder=""
                                        class="form-control input-md" required disabled>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="nsocioe">Ier Nombre del socio</label>
                                    <input id="nsocioe" name="nsocioe" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el primer nombre del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="nnsocioe">IIdo Nombre del socio</label>
                                    <input id="nnsocioe" name="nnsocioe" type="text" class="form-control input-md"
                                        required="">
                                    <span class="help-block">Escriba el segundo nombre del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="asocioe">Ier Apellido del socio</label>
                                    <input id="asocioe" name="asocioe" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el primer apellido del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="aasocioe">IIer Apellido del socio</label>
                                    <input id="aasocioe" name="aasocioe" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba el segundo apellido del socio</span>
                                </div>
                                
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="cesocioe">Cedula</label>
                                    <input id="cesocioe" name="cesocioe" type="text" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba la cedula del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="fnsocioe">Fecha de nacimiento</label>
                                    <input id="fnsocioex" name="fnsocioe" type="date" placeholder=""
                                        class="form-control input-md" required="">
                                    <span class="help-block">Escriba la fecha de nacimiento del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="ccoope">Cooperativa</label>
                                    <select id="cbccoopex" name="cbccoope" onchange="asignarvalor('ccoopexe', 'cbccoopex')" class="form-control">
                                        <?php echo $combocoop; ?>
                                    </select>
                                    <span class="help-block">Escriba el # de la cooperativa del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="care">Cargo</label>
                                    <select id="cbcarex" name="cbcare"  onchange="asignarvalor('carexe', 'cbcarex')"   class="form-control">
                                        <?php echo $combocoopI; ?>
                                    </select>
                                    <span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="cesocioe">Cargo</label>
                                    <input id="carexe" name="care" type="text" placeholder=""
                                        class="form-control input-md" required disabled>
                                    <span class="help-block">Escriba la cedula del socio</span>
                                </div>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="cesocioe">Cooperativa</label>
                                    <input id="ccoopexe" name="ccoope" type="text" placeholder=""
                                        class="form-control input-md" required disabled>
                                    <span class="help-block">Escriba la cedula del socio</span>
                                </div>
                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="editarSocios()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Actualizar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p>Llene todos los campos debido a que son requeridos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para eliminar cooperativas -->
        <div class="modal fade" tabindex="-1" role="dialog" id="SociosEliminar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formSocio">
                            <form class="" id="SocioEdit" name="frmEliminarSocio">
                                <h2 class="centrar">Eliminar el concepto</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idsocioDel"></label>
                                    <input id="idsocioDel" name="idsocioDel" class="form-control" type="text" required
                                        disabled>

                                </div>

                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="eliminarSocios()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Eliminar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="zmdi zmdi-delete"></i> Descartar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p>Llene todos los campos debido a que son requeridos</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.js"></script>
    <!--script src="../js/jquery-1.12.3.js"></script-->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="../js/buttons.bootstrap.min.js"></script>
    <script src="../js/jszip.min.js"></script>
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>
    <script src="../js/buttons.html5.min.js"></script>
    <script src="../js/socios.js"></script>

</body>

</html>