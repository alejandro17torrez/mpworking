<?php include('./headerAdmin.php'); ?>


<?php 

require "../conexion/conexion.php";
$conexion = new Conexion();
$enlace = $conexion->Conectar();

$grupo = null;
$subgrupo = null;
$tipo = null;

$grupos = "SELECT * FROM grupos";
$x = $enlace->prepare($grupos);
$x->execute();
$filas = $x->fetchAll(PDO::FETCH_ASSOC);



foreach ($filas as $fila) 
{
    $grupo .= "<option value='".$fila['id']."'>".$fila['grupo']."</option>";
}

$subgrupos = "SELECT * FROM subgrupos";
$x = $enlace->prepare($subgrupos);
$x->execute();
$filas = $x->fetchAll(PDO::FETCH_ASSOC);



foreach ($filas as $fila) 
{
    $subgrupo .= "<option value='".$fila['id']."'>".$fila['subgrupo']."</option>";
}


$tipos = "SELECT * FROM tipo_cuenta";
$x = $enlace->prepare($tipos);
$x->execute();
$filas = $x->fetchAll(PDO::FETCH_ASSOC);

foreach ($filas as $fila) 
{
    $tipo .= "<option value='".$fila['id']."'>".$fila['tipo']."</option>";
}


?>



<body>

	<div id="page-wrapper">

		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">
				<table id="dt_cuentas" class="table table-bordered table-hover" cellspacing="0" width="100%"
					style="padd">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Grupo</th>
							<th>Subgrupo</th>
							<th>Tipo</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>



		<!-- Modal para agregar -->
		<div class="modal fade" tabindex="-1" role="dialog" id="addcts">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCuentas">
							<form role="form" class="" id="cuentas" name="frmAddCuentas">
								<h2 class="centrar">Agregar nueva cuenta</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="codCuenta">Codigo de la cuenta</label>
									<input id="codCuenta" name="codCuenta" class="form-control" type="text" required>
									<p class="help-block">Escribe el codigo de la cuenta</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="descCuenta">Descripcion de la cuenta</label>
									<input id="descCuenta" name="descCuenta" class="form-control" type="text" required>
									<p class="help-block">Escribe la descripcion de la cuenta</p>
								</div>


								<div class="form-group label-floating col-sm-12">
										<br>
										<label class="control-label" for="cbSubgrupoCuenta">Grupo de las cuentas:</label>
										<select id="cbGrupoCuenta" name="cbGrupoCuenta" class="form-control">
											<?php echo $grupo; ?>
										</select>
										<br>
										<label class="control-label" for="cbGrupoCuenta">Sub Grupo de las cuentas:</label>
										<select id="cbSubgrupoCuenta" name="cbSubgrupoCuenta" class="form-control">
											<?php  echo $subgrupo; ?>
										</select>
										<br>
										<label class="control-label" for="cbTipo">Tipo cuentas:</label>
										<select id="cbTipo" name="cbTipo" class="form-control">
											<?php echo $tipo; ?>
										</select>
										<br>
									<p class="help-block">Escriba el sub grupo al que pertenece la cuenta</p>
								</div>

								<!--div class="form-group label-floating col-sm-12">
									<label class="control-label" for="grupoCuenta">Grupo de la cuenta:</label>
									<input id="grupoCuenta" name="grupoCuenta" class="form-control" type="text"
										required>
									<p class="help-block">Escriba el grupo al que pertenece la cuenta</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="subgrupoCuenta">Sub Grupo de las cuentas:</label>
									<input id="subgrupoCuenta" name="subgrupoCuenta" class="form-control" type="text"
										required>
									<p class="help-block">Escriba el sub grupo al que pertenece la cuenta</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="tipoCuenta">Tipo de cuentas:</label>
									<input id="tipoCuenta" name="tipoCuenta" class="form-control" type="text" required>
									<p class="help-block">Escriba el tipo al que pertenece la cuenta</p>
								</div-->
								<div class=" ">
									<button type="button" class="btn btn-primary" onclick="agregarCuentas()"
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


		<!-- Modal para editar cuentas -->
		<div class="modal fade" tabindex="-1" role="dialog" id="cuentasEditar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCuentas">
							<form class="" id="cuentasEdit" name="frmEditCuentas">
								<h2 class="centrar">Editar la cuentas</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idCuentas"></label>
									<input id="idCuentas" name="idCuentas" class="form-control" type="text" required
										disabled>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="codC">Codigo de la cuenta</label>
									<input id="codC" name="codCuenta" class="form-control" type="text" required>
									<p class="help-block">Escribe el codigo de la cuenta</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="des">Descripcion de la cuenta</label>
									<input id="des" name="desCuenta" class="form-control" type="text" required>
									<p class="help-block">Escribe la descripcion de la cuenta</p>
								</div>


								<div class="form-group label-floating col-sm-12">
										<br>
										<label class="control-label" for="cbSubgrupoCuenta">Grupo de las cuentas:</label>
										<select id="cbGrupoCuentae" name="cbGrupoCuenta"  onchange="asignarvalor('gcuentae', 'cbGrupoCuentae')"  class="form-control">
											<?php echo $grupo; ?>
										</select>
										<br>
										<label class="control-label" for="cbGrupoCuenta">Sub Grupo de las cuentas:</label>
										<select id="cbSubgrupoCuentae" name="cbSubgrupoCuenta" onchange="asignarvalor('sgcuentae', 'cbSubgrupoCuentae')"   class="form-control">
											<?php  echo $subgrupo; ?>
										</select>
										<br>
										<label class="control-label" for="cbTipo">Tipo cuentas:</label>
										<select id="cbTipoe" name="cbTipo"  onchange="asignarvalor('tcuentae', 'cbTipoe')"   class="form-control">
											<?php echo $tipo; ?>
										</select>
										<br>
									<p class="help-block">Escriba el sub grupo al que pertenece la cuenta</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="gcuenta">Grupo de la cuenta:</label>
									<input id="gcuentae" name="grupoCuenta" class="form-control" type="text" required disabled>
									<p class="help-block">Escriba el grupo al que pertenece la cuenta</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="sgcuenta">Sub Grupo de las cuentas:</label>
									<input id="sgcuentae" name="subgrupoCuenta" class="form-control" type="text"
										required disabled>
									<p class="help-block">Escriba el sub grupo al que pertenece la cuenta</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="tcuenta">Tipo de cuentas:</label>
									<input id="tcuentae" name="tipoCuenta" class="form-control" type="text" required disabled>
									<p class="help-block">Escriba el tipo al que pertenece la cuenta</p>
								</div>
								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="editarCuentas()"
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
		<div class="modal fade" tabindex="-1" role="dialog" id="cuentasEliminar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCooperativa">
							<form class="" id="cuentasEdit" name="frmEliminarCuentas">
								<h2 class="centrar">Eliminar la cuenta</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idCuentasDel"></label>
									<input id="idCuentasDel" name="idCuentasDel" class="form-control" type="text"
										required disabled>

								</div>

								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="eliminarCuentas()"
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
	<script src="../js/cuentas.js"></script>

</body>

</html>