<?php include('./headerAdmin.php');?>

<body>

	<div id="page-wrapper">

		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">
				<table id="dt_cooperativa" class="table table-bordered table-hover" cellspacing="0" width="100%"
					style="padd">
					<thead>
						<tr>
							<th>Cooperativa</th>
							<th>Resolucion</th>
							<th>RUC</th>
							<th>usuario</th>
							<th>contraseña</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>


		<!--button type="button" id="listar"class="btn btn-primary"   ><i class="zmdi zmdi-thumb-up"></i> Listar</button-->


		<!-- Modal para agregar -->
		<div class="modal fade" tabindex="-1" role="dialog" id="cooperativasAgregar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCooperativa">
							<form role="form" class="" id="cooperativas" name="frmAddCoop">
								<h2 class="centrar">Agregar nueva cooperativa</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="nc">Nombre de la cooperativa</label>
									<input id="nc" name="nc" class="form-control" type="text" required>
									<p class="help-block">Escribe el nombre de la nueva cooperativa de vivienda que
										desea agregar</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="rc">Resolucion de la cooperativa de
										vivienda</label>
									<input id="rc" name="rc" class="form-control" type="number" required>
									<p class="help-block">Escribe el numero de resolucion de la cooperativa de vivienda
										que desea agregar</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="nr">RUC:</label>
									<input id="nr" name="nr" class="form-control" type="text" required>
									<p class="help-block">Escriba el RUC de la cooperativa de vivienda que desea agregar
									</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="un">Nombre de usuario:</label>
									<input id="un" name="un" class="form-control" type="text" required>
									<p class="help-block">Escriba el nombre de usuario de la cooperativa de vivienda que
										desea agregar</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="pass">contraseña:</label>
									<input id="pass" name="pass" class="form-control" type="password" required>
									<p class="help-block">Escriba la contraseña de la cooperativa de vivienda que desea
										agregar</p>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary" onclick="agregarCooperativas()"
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
		<div class="modal fade" tabindex="-1" role="dialog" id="cooperativasEditar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCooperativa">
							<form class="" id="cooperativasEdit" name="frmEditCoop">
								<h2 class="centrar">Editar la cooperativa</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idCooperativa"></label>
									<input id="idcope" name="idCooperativa" class="form-control" type="text" required
										disabled>
									<br>
									<input id="iduser" name="iduser" class="form-control" type="text" required
										disabled>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="nombreCooperativa"></label>
									<input id="nce" name="nombreCooperativa" class="form-control" type="text" required>
									<p class="help-block">Escribe el nombre de la nueva cooperativa de vivienda que
										desea actualizar</p>
								</div>

								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="resolucionCooperativa"></label>
									<input id="rce" name="resolucionCooperativa" class="form-control" type="text"
										required>
									<p class="help-block">Escribe el numero de resolucion de la cooperativa de vivienda
										que desea actualizar</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="numeroRUC"></label>
									<input id="rco" name="numeroRUC" class="form-control" type="text" required>
									<p class="help-block">Escriba el RUC de la cooperativa de vivienda que desea
										actualizar</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="une">Nombre de usuario:</label>
									<input id="une" name="une" class="form-control" type="text" required>
									<p class="help-block">Escriba el nombre de usuario de la cooperativa de vivienda que
										desea agregar</p>
								</div>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="passe">contraseña:</label>
									<input id="passe" name="passe" class="form-control" type="password" required>
									<p class="help-block">Escriba la contraseña de la cooperativa de vivienda que desea
										agregar</p>
								</div>
								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="editarCooperativas()"
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
		<div class="modal fade" tabindex="-1" role="dialog" id="cooperativasEliminar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="formCooperativa">
							<form class="" id="cooperativasEdit" name="frmEliminarCoop">
								<h2 class="centrar">Eliminar la cooperativa</h2>
								<div class="form-group label-floating col-sm-12">
									<label class="control-label" for="idCooperativa"></label>
									<input id="idCoopDel" name="idCooperativa" class="form-control" type="text" required
										disabled>

								</div>

								<div class="form-group col-sm-auto ">
									<button type="button" class="btn btn-primary" onclick="eliminarCooperativas()"
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
	<script src="../js/cooperativas.js"></script>



</body>

</html>