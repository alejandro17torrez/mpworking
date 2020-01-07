<?php include('./headerAdmin.php'); ?>


<body>

    <div id="page-wrapper">

        <br>
        <!-- tabs  -->

        <button class="tablink" onclick="openPage('cargosTab', this, 'gray')">Cargos</button>
        <button class="tablink" onclick="openPage('gruposTab', this, 'gray')" id="defaultOpen">Grupos</button>
        <button class="tablink" onclick="openPage('subGruposTab', this, 'gray')">Sub grupos</button>
        <button class="tablink" onclick="openPage('tiposTab', this, 'gray')">Tipos de cuentas</button>

        <div id="cargosTab" class="tabcontent">

            <div id="" class="">
                <div class="">
                    <h3 class="text-center"> <small class="mensaje"></small> Cargos para cada cooperativa </h3>
                </div>
                <div class="table-responsive ">
                    <table id="dt_cargo" class="table table-bordered " cellspacing="0" width="100%"
                        style="padd">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div id="gruposTab" class="tabcontent">
            <div id="" class="">
                <div class="">
                    <h3 class="text-center"> <small class="mensaje"></small> Grupos para cada cuenta de cada cooperativa
                    </h3>
                </div>
                <div class="table-responsive ">
                    <table id="dt_gr" class="table table-bordered " cellspacing="0" width="100%"
                        style="padd">
                        <thead>
                            <tr>
                                <th>Grupos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div id="subGruposTab" class="tabcontent">
            <div id="" class="">
                <div class="">
                    <h3 class="text-center"> <small class="mensaje"></small> Sub grupos para cada cuenta de cada
                        cooperativa
                    </h3>
                </div>

                <div class="table-responsive ">
                    <table id="dt_subgr" class="table table-bordered " cellspacing="0" width="100%"
                        style="padd">
                        <thead>
                            <tr>
                                <th>Sub grupos </th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div id="tiposTab" class="tabcontent">
            <div id="" class="">
                <div class="">
                    <h3 class="text-center"> <small class="mensaje"></small>Tipos de cuenta para cada cuenta de cada
                        cooperativa</h3>
                </div>
                <div class="table-responsive ">
                    <table id="dt_tipo" class="table table-bordered " cellspacing="0" width="100%"
                        style="padd">
                        <thead>
                            <tr>
                                <th>tipo de cuenta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal para agregar cargos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addcargo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmAddCargos">
                            <h2 class="centrar">Agregar un nuevo cargo</h2>
                            <div class="form-group label-floating col-sm-12">
                                <label class="control-label" for="ncar">Cargo</label>
                                <input id="ncar" name="ncar" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el cargo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="add_employed()"
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


        <!-- Modal para agregar grupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addgr">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmAddgrupo">
                            <h2 class="centrar">Agregar un nuevo grupo contable</h2>
                            <div class="form-group label-floating col-sm-12">
                                <label class="control-label" for="ngr">Grupo</label>
                                <input id="ngr" name="ngr" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el Grupo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="add_group()"
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


        <!-- Modal para agregar sub grupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addsubgr">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmAddsgrupo">
                            <h2 class="centrar">Agregar un nuevo subgrupo</h2>
                            <div class="form-group label-floating col-sm-12">
                                <label class="control-label" for="nsgr">Sub Grupo</label>
                                <input id="nsgr" name="nsgr" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el sub Grupo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="add_subgroup()"
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

        <!-- Modal para agregar tipo de cuenta -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addtipo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmAddtipo">
                            <h2 class="centrar">Agregar un nuevo tipo de cuenta</h2>
                            <div class="form-group label-floating col-sm-12">
                                <label class="control-label" for="ntc">Tipo de cuenta</label>
                                <input id="ntc" name="ntc" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el tipo de cuenta</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="add_type()"
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


        <!-- Modales para editar los auxliares -->


        <!-- Modal para editar cargos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="editcargo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmEditCargos">
                            <h2 class="centrar">Agregar un nuevo cargo</h2>
                            <div class="form-group label-floating col-sm-12">
                                <br>
                                <label class="control-label" for="idcare">Id</label>
                                <input id="idcare" name="idcare" type="text" placeholder=""
                                    class="form-control input-md" required disabled>
                                <br>
                                <label class="control-label" for="ncare">Cargo</label>
                                <input id="ncare" name="ncar" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el cargo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="edit_employed()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Editar</button>
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


        <!-- Modal para editar grupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="editgr">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmEditgrupo">
                            <h2 class="centrar">Agregar un nuevo grupo contable</h2>
                            <div class="form-group label-floating col-sm-12">
                                <br>
                                <label class="control-label" for="idgr">Id</label>
                                <input id="idgr" name="idgr" type="text" placeholder="" class="form-control input-md"
                                    required disabled>
                                <label class="control-label" for="ngre">Grupo</label>
                                <input id="ngre" name="ngre" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el Grupo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="edit_group()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Editar</button>
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


        <!-- Modal para editar sub grupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="editsubgr">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmEditsgrupo">
                            <h2 class="centrar">Agregar un nuevo subgrupo</h2>
                            <div class="form-group label-floating col-sm-12">
                                <br>
                                <label class="control-label" for="idsgr">Id</label>
                                <input id="idsgr" name="idsgr" type="text" placeholder="" class="form-control input-md"
                                    required>

                                <label class="control-label" for="nsgre">Sub Grupo</label>
                                <input id="nsgre" name="nsgre" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el sub Grupo</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="edit_subgroup()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Editar</button>
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

        <!-- Modal para editar tipo de cuenta -->
        <div class="modal fade" tabindex="-1" role="dialog" id="edittipo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="" id="Socios" name="frmEdittipo">
                            <h2 class="centrar">Agregar un nuevo tipo de cuenta</h2>
                            <div class="form-group label-floating col-sm-12">
                                <br>
                                <label class="control-label" for="idtipo">Id</label>
                                <input id="idtipo" name="idtipo" type="text" placeholder=""
                                    class="form-control input-md" required>

                                <label class="control-label" for="ntce">Tipo de cuenta</label>
                                <input id="ntce" name="ntce" type="text" placeholder="" class="form-control input-md"
                                    required>
                                <span class="help-block">Escriba el tipo de cuenta</span>
                            </div>
                            <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="edit_type()"
                                        data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Editar</button>
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



        <!--Modales para eliminar los auxiliares-->

        <!-- Modal para eliminar cargo -->
        <div class="modal fade" tabindex="-1" role="dialog" id="CargoEliminar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCooperativa">
                            <form class="" id="frmEliminarCar" name="frmEliminarCar">
                                <h2 class="centrar">Eliminar el cargo</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idcarDel"></label>
                                    <input id="idcarDel" name="idcarDel" class="form-control" type="text" required
                                        disabled>

                                </div>

                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="delete_employed()"
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


        <!-- Modal para eliminar grupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="GrupoEliminar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCooperativa">
                            <form class="" id="frmEliminarGr" name="frmEliminarGr">
                                <h2 class="centrar">Eliminar el grupo</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idgrDel"></label>
                                    <input id="idgrDel" name="idgrDel" class="form-control" type="text" required
                                        disabled>

                                </div>

                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="delete_group()"
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

        <!-- Modal para eliminar subgrupos -->
        <div class="modal fade" tabindex="-1" role="dialog" id="SgrupoEliminar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCooperativa">
                            <form class="" id="frmEliminarSgr" name="frmEliminarSgr">
                                <h2 class="centrar">Eliminar el sub grupo</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idcarDel"></label>
                                    <input id="idsgrDel" name="idsgrDel" class="form-control" type="text" required
                                        disabled>

                                </div>

                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="delete_subgroup()"
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

        <!-- Modal para eliminar tipo -->
        <div class="modal fade" tabindex="-1" role="dialog" id="tipoEliminar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="formCooperativa">
                            <form class="" id="frmEliminarTipo" name="frmEliminarTipo">
                                <h2 class="centrar">Eliminar el tipo</h2>
                                <div class="form-group label-floating col-sm-12">
                                    <label class="control-label" for="idtipoDel"></label>
                                    <input id="idtipoDel" name="idtipoDel" class="form-control" type="text" required
                                        disabled>

                                </div>

                                <div class="form-group col-sm-auto ">
                                    <button type="button" class="btn btn-primary" onclick="delete_type()"
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
    <script src="../js/jszip.min.js"> </script>
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>
    <script src="../js/buttons.html5.min.js"></script>
    <script src="../js/auxiliares.js"></script>

</body>

</html>