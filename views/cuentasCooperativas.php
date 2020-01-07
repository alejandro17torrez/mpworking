<?php include('./headerAdmin.php'); ?>

<body>

	<?php 
    require "../conexion/conexion.php";
    $conexion = new Conexion();
	$enlace = $conexion->Conectar();
    $combocoop = null;
    $combocon = null;
    $combocue = null;

    $sql = "SELECT * FROM `cooperativa`";
    $sqlII = "SELECT * FROM `conceptos`";
    $sqlIII = "SELECT * FROM `catalogo`";
	$x = $enlace->prepare($sql);
	$x->execute();
    $opciones = $x->fetchAll(PDO::FETCH_ASSOC);
    $xy = $enlace->prepare($sqlII);
	$xy->execute();
    $opcionesII = $xy->fetchAll(PDO::FETCH_ASSOC);
    $xyz = $enlace->prepare($sqlIII);
	$xyz->execute();
	$opcionesIII = $xyz->fetchAll(PDO::FETCH_ASSOC);
	foreach ($opciones as $op) 
	{
		$combocoop .= "<option value='".$op['id']."'>".$op['nombre_cooperativa']."</option>";
	}
	
    foreach ($opcionesII as $opII) 
	{
		$combocon .= "<option value='".$opII['id']."'>".$opII['concepto']."</option>";
	}
	
    foreach ($opcionesIII as $opIII) 
	{
		$combocue .= "<option value='".$opIII['id']."'>".$opIII['cuenta']."</option>";
	}

?>

	<div id="page-wrapper">

		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">
				<table id="dt_dc" class="table table-bordered table-hover" cellspacing="0" width="100%" style="padd">
					<thead>
						<tr>
							<th>Cooperativa</th>
							<th>Codigo</th>
							<th>Cuenta</th>
							<th>Saldo</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>



		<!-- Modal para agregar -->
		<div class="modal fade" tabindex="-1" role="dialog" id="addcd">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCd">
							<form role="form" class="" id="cuentascon" name="frmAddCd">
								<h2 class="centrar">Definir nueva cuenta para x cooperativa</h2>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="cp">Cooperativa</label>
									<select id="cp" name="cp" class="form-control">
										<?php echo $combocoop; ?>
									</select>
									<span class="help-block">seleccione la cooperativa</span>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="ce">Cuentas</label>
									<select id="ce" name="ce" class="form-control">
										<?php echo $combocue; ?>
									</select>
									<span class="help-block">seleccione la cuenta del catalogo de la cooperativa</span>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="sal">Saldo inicial</label>
									<input type="number" name="sal" id="sal" class="form-control">
									<span class="help-block">saldo inicial de la cuenta</span>
								</div>
								<div class=" ">
									<button type="button" class="btn btn-primary" onclick="agregarCd()"
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



		<!-- Modal para editar -->
		<div class="modal fade" tabindex="-1" role="dialog" id="editccx">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCd">
							<form role="form" class="" id="cuentascon" name="frmecc">
								<h2 class="centrar">Editar la cuenta de la cooperativa</h2>

								<div class="form-group label-floating col-sm-12">
									<input type="text" name="idcentas" id="idccx" class="form-control" disabled>
								</div>


								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="cp">Cooperativa</label>
									<select id="cpex" name="cp" onchange="asignarvalor('coopccx', 'cpex')"
										class="form-control">
										<?php echo $combocoop; ?>
									</select>
									<span class="help-block">seleccione la cooperativa</span>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="ce">Cuentas</label>
									<select id="ceex" name="ce" class="form-control"
										onchange="asignarvalor('cueccx', 'ceex')">
										<?php echo $combocue; ?>
									</select>
									<span class="help-block">seleccione la cuenta del catalogo de la cooperativa</span>
								</div>


								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="coopccx">Cooperativa</label>
									<br>
									<input type="text" name="coopccx" id="coopccx" class="form-control" disabled>
									<br>
									<label class="control-label" for="cueccx">Cuenta</label>
									<input type="text" name="cueccx" id="cueccx" class="form-control" disabled>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="sal">Saldo inicial</label>
									<input type="number" name="sal" id="salexcc" class="form-control">
									<span class="help-block">saldo inicial de la cuenta</span>
								</div>

								<div class=" ">
									<button type="button" class="btn btn-primary" onclick="editarCd()"
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



		<!-- Modal para agregar conceptos a las cuentas-->
		<div class="modal fade" tabindex="-1" role="dialog" id="cdAddCCpsy">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"> Conceptos para agregar conceptos a las copoerativas</h4>
					</div>
					<div class="modal-body">
					<form role="form" class="" id="cdAddCCpsx" name="cdAddCCpsx">
						<div class="form-group label-floating col-sm-12">
							<input type="text" name="idcuecop" id="idcuecopx" class="form-control" disabled>
							<br>
						</div>
							<br>
							<div class="form-group label-floating col-sm-12" id="lugarIngreso">
								<br>
								<label for="signo">signo:</label>
								<select class="form-control" id="signocc" name="signocc">
									<option value="=">=</option>
									<option value="+">+</option>
									<option value="-">-</option>
								</select>
							</div>
							<div class="form-group label-floating col-sm-12" id="lugarIngreso">
								<br>
								<label for="signo">concepto:</label>
								<select class="form-control" id="conceptocc" name="conceptocc">
									<?php echo $combocon; ?>
								</select>
							</div>
							<div class=" ">
									<button type="button" class="btn btn-primary" onclick="agregarCc()"
										data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Actualizar</button>
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



			<!-- Modal para editar cooperativas -->
			<div class="modal fade" tabindex="-1" role="dialog" id="cdEditar">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div id="formCd">
								<form class="" id="cdEdit" name="frmEditCd">
									<h2 class="centrar">Editar los conceptos ligados a las cuentas</h2>
									<div class="form-group label-floating col-sm-12">
										<label class="control-label" for="idcd"></label>
										<input id="idcd" name="idcd" class="form-control" type="text" required disabled>
									</div>
									<div class="form-group label-floating col-sm-12">
										<label class="control-label" for="ccoop">Cooperativa</label>
										<select id="ccoop" name="ccoop" class="form-control">
											<?php echo $combocoop; ?>
										</select>
										<span class="help-block">seleccione la cooperativa</span>
									</div>
									<div class="form-group label-floating col-sm-12">
										<label class="control-label" for="ccue">Cuenta</label>
										<select id="ccue" name="ccue" class="form-control">
											<?php echo $combocue; ?>
										</select>
										<span class="help-block">seleccione la cuenta del catalogo de la
											cooperativa</span>
									</div>
									<div class="form-group label-floating col-sm-12">
										<label class="control-label" for="sal">Saldo inicial</label>
										<input type="number" name="sal" id="sal">
										<span class="help-block">saldo inicial de la cuenta</span>
									</div>

									<div class="form-group col-sm-auto ">
										<button type="button" class="btn btn-primary" onclick="editarCd()"
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
			<div class="modal fade" tabindex="-1" role="dialog" id="cdEliminar">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div id="formCooperativa">
								<form class="" id="cdEdit" name="frmEliminarCc">
									<h2 class="centrar">Eliminar el concepto ligado a la cuenta</h2>
									<div class="form-group label-floating col-sm-12">
										<label class="control-label" for="idCdDel"></label>
										<input id="idCdDel" name="idCdDel" class="form-control" type="text" required
											disabled>

									</div>

									<div class="form-group col-sm-auto ">
										<button type="button" class="btn btn-primary" onclick="eliminarCd()"
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
		<script src="../js/dconceptos.js"></script>

</body>

</html>