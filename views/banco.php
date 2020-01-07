<?php include('./headerAdmin.php'); ?>

<body>

<?php 
    require "../conexion/conexion.php";
    $conexion = new Conexion();
	$enlace = $conexion->Conectar();
	$combocoop = null;

	$sql = "SELECT * FROM `cooperativa`";
	$x = $enlace->prepare($sql);
	$x->execute();
	$opciones = $x->fetchAll(PDO::FETCH_ASSOC);
	foreach ($opciones as $op) 
	{
		$combocoop .= "<option value='".$op['id']."'>".$op['nombre_cooperativa']."</option>";
	}

?>


<div id="page-wrapper">

        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_bank" class="table table-bordered table-hover" cellspacing="0" width="100%" style="padd">
					<thead>
						<tr>								
							<th>Cuenta</th>
                            <th>Banco</th>
							<th>Tipo moneda</th>
							<th>Tipo</th>
							<th>Nombre Cooperativa</th>
							<th>Acciones</th>											
						</tr>
					</thead>					
				</table>
			</div>			
        </div>
        
        

        <!-- Modal para agregar -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addbank">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				  <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <h4 class="modal-title"></h4>
				  </div>
				  <div class="modal-body">
						<div id="formCps">
								<form role="form" class="" id="Bank" name="frmAddBank" >
										<h2 class="centrar">Agregar una nueva cuenta de banco</h2>
						
										<div class="form-group label-floating col-sm-12">
                                        <label class="control-label" for="nbanco">Nombre de la entidad Bancaria</label>  
                                            <input id="nbanco" name="nbanco" type="text" placeholder="" class="form-control input-md" required="">
                                            <span class="help-block">Escriba el nombre del banco afiliado</span>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
											<label class="control-label" for="desccps">Descripcion de la cuenta vinculada</label>
											<input id="cbanco" name="cbanco" type="text"  class="form-control input-md" required="">
											<span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
                                            <label class="control-label" for="ccoop">Cooperativa</label>
                                            <select id="ccoop" name="ccoop" class="form-control">
                                                <?php echo $combocoop; ?>
                                            </select>
                                            <span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
                                            <label class="control-label" for="tc">Tipo de cuenta</label>
                                            <select id="tc" name="tc" class="form-control">
											   <option value="credito">Credito</option>
											   <option value="debito">Debito</option>
                                            </select>
                                            <span class="help-block">Escriba el tipo de cuenta del banco afiliado</span>
										</div>
										<div class="form-group label-floating col-sm-12">
                                            <label class="control-label" for="tm">Tipo de moneda</label>
                                            <select id="tm" name="tm" class="form-control">
											   <option value="C$">Cordoba oro</option>
											   <option value="$">Dollar</option>
                                            </select>
                                            <span class="help-block">Escriba el tipo de moneda de la cuenta del banco afiliado</span>
										</div>       
										<div class=" ">
											<button type="button" class="btn btn-primary" onclick="agregarBanco()" data-dismiss="modal" ><i class="zmdi zmdi-thumb-up"></i> Agregar</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="zmdi zmdi-delete"></i> Descartar</button>
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
	<div class="modal fade" tabindex="-1" role="dialog" id="BankEditar">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title"></h4>
			  </div>
			  <div class="modal-body">
					<div id="formCps">
							<form class="" id="BankEdit" name="frmEditBank" >
										<h2 class="centrar">Editar la cuentas</h2>
										<div class="form-group label-floating col-sm-12">
                                        <label class="control-label" for="nbanco">ID</label>  
                                            <input id="idbancoe" name="idbancoe" type="text" placeholder="" class="form-control input-md" required disabled>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
											<label class="control-label" for="desccps">Descripcion de la cuenta vinculada</label>
											<input id="cbancoe" name="cbanco" type="text"  class="form-control input-md" required="">
											<span class="help-block">Escriba el # de cuenta del banco afiliado</span>
										</div>
										<div class="form-group label-floating col-sm-12">
                                        <label class="control-label" for="nbanco">Nombre de la entidad Bancaria</label>  
                                            <input id="nbancoe" name="nbanco" type="text" placeholder="" class="form-control input-md" required="">
                                            <span class="help-block">Escriba el nombre del banco afiliado</span>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
                                            <label class="control-label" for="ccoop">Cooperativa</label>
                                            <select id="ccoope" name="ccoop" class="form-control">
                                            <?php echo $combocoop; ?>
                                            </select>
                                            <span class="help-block">Escriba el # de cuenta del banco afiliado</span>
                                        </div>
                                        <div class="form-group label-floating col-sm-12">
										<label class="control-label" for="tce">Tipo de cuenta</label>
                                            <select id="tce" name="tce" class="form-control">
											   <option value="credito">Credito</option>
											   <option value="debito">Debito</option>
                                            </select>
                                            <span class="help-block">Escriba el tipo de cuenta del banco afiliado</span>
										</div>
										<div class="form-group label-floating col-sm-12">
                                            <label class="control-label" for="tme">Tipo de moneda</label>
                                            <select id="tme" name="tme" class="form-control">
											   <option value="C$">Cordoba oro</option>
											   <option value="$">Dollar</option>
                                            </select>
                                            <span class="help-block">Escriba el tipo de moneda de la cuenta del banco afiliado</span>
										</div>
									<div class="form-group col-sm-auto ">
										<button type="button" class="btn btn-primary" onclick="editarBanco()" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Actualizar</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="zmdi zmdi-delete"></i> Descartar</button>
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
	<div class="modal fade" tabindex="-1" role="dialog" id="BankEliminar">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title"></h4>
			  </div>
			  <div class="modal-body">
					<div id="formCooperativa">
							<form class="" id="BankEdit" name="frmEliminarBank" >
									<h2 class="centrar">Eliminar el concepto</h2>
									<div class="form-group label-floating col-sm-12">
											<label class="control-label" for="idbankDel"></label>
											<input id="idbankDel" name="idbankDel" class="form-control" type="text" required disabled>
											
									</div>
									       
									<div class="form-group col-sm-auto ">
										<button type="button" class="btn btn-primary" onclick="eliminarBanco()" data-dismiss="modal"  ><i class="zmdi zmdi-thumb-up"></i> Eliminar</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="zmdi zmdi-delete"></i> Descartar</button>
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
<script src="../js/dataTables.bootstrap.js" ></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../js/buttons.bootstrap.min.js"></script>
<script src="../js/jszip.min.js" ></script>
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>
<script src="../js/buttons.html5.min.js" ></script>
<script src="../js/banco.js" ></script>



</body>

</html>
