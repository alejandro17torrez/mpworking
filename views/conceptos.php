<?php include('./headerAdmin.php'); ?>

<body>

	<div id="page-wrapper">

		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">
				<table id="dt_cps" class="table table-bordered table-hover" cellspacing="0" width="100%" style="padd">
					<thead>
						<tr>
							<th>Descripcion</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>



		<!-- Modal para agregar -->
		<div class="modal fade" tabindex="-1" role="dialog" id="addcps">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCuentas">
							<form role="form" class="" id="cuentas" name="frmAddCps">
								<h2 class="centrar">Agregar un nuevo concepto</h2>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="desccps">Descripcion de la cuenta
										vinculada</label>
									<input id="desccps" name="desccps" class="form-control" type="text" required>
									<p class="help-block">Escribe la descripcion del concepto a la cuenta a vincular</p>
								</div>
								<div class=" ">
									<button type="button" class="btn btn-primary" onclick="agregarCps()"
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
		<div class="modal fade" tabindex="-1" role="dialog" id="cpsEditar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCuentas">
							<form class="" id="cpsEdit" name="frmEditCps">
								<h2 class="centrar">Editar la cuentas</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idcps"></label>
									<input id="idcps" name="idcps" class="form-control" type="text" required disabled>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="codcps">Concepto de la cuenta</label>
									<input id="codcps" name="codcps" class="form-control" type="text" required>
									<p class="help-block">Escribe el concepto</p>
								</div>

								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="editarCps()"
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
		<div class="modal fade" tabindex="-1" role="dialog" id="cpsEliminar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCooperativa">
							<form class="" id="cuentasEdit" name="frmEliminarCps">
								<h2 class="centrar">Eliminar el concepto</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idCpsDel"></label>
									<input id="idCpsDel" name="idCpsDel" class="form-control" type="text" required
										disabled>

								</div>

								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="eliminarCps()"
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
	<script src="../js/conceptos.js"></script>

</body>

</html>