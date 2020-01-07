<?php
    use ___PHPSTORM_HELPERS\PS_UNRESERVE_PREFIX_this;
    require "../conexion/conexion.php";

    Class Facturas
    {
        private $conexion, $enlace, $sql, $execute, $data, 
        $filas, $dato, $debe, $haber, $date, $asiento, $numero, $comprobante, $documento, $concepto;

        //este es el constructor
        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->enlace = $this->conexion->Conectar();
            $this->sql = null;
            $this->execute = null;
            $this->data = null;
            $this->numero = null;
        }

        public function test()
        {
            echo "holanda mundo xd <br>";     
        }


        public function updating_balance_of_each_count()
        {
            $this->sql = "SELECT mo.cuenta_id, mo.parcial
            FROM movimientos mo
            ORDER BY mo.id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $x) {
                $this->dato = $x['cuenta_id'];
                $this->numero = $x['parcial'];
            }

            echo "El parcial es: ". $this->numero. "<br>";
            echo "El id del concepto es: ". $this->dato. "<br>";

           
            $this->updating_balance_of_each_count_II($this->dato, $this->numero);
        }

        public function updating_balance_of_each_count_II($datos, $saldo)
        {

            $this->data = [
                'id_concepto' => $datos,
            ];

            $this->sql = "SELECT cc.id, signo 
            FROM cuentas_cooperativas cc, cuentas_conceptos coop, movimientos mo
            WHERE mo.cuenta_id = :id_concepto
            AND mo.cuenta_id = coop.id
            AND coop.cuentas_coop = cc.id
            LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $x) {
                $this->dato = $x['id'];
                $this->signo = $x['signo'];
            }

            echo "El id de la cuenta a afectar el saldo es: ". $this->dato. "<br>";
            echo "El saldo a agregar o disminuir es: ". $saldo."<br>";
            echo "El signo es: ". $this->signo. "<br>";

            $this->updating_balance_of_each_count_III($this->dato, $saldo, $this->signo);
            
        }

        public function updating_balance_of_each_count_III($id, $saldo, $signo)
        {
            $this->data = [
                'id' => $id,
                'saldo' => $saldo,
            ];

            if ($signo == "+") {
                $this->sql = "UPDATE cuentas_cooperativas SET saldo = (saldo + :saldo) WHERE id = :id";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
            }
            elseif($signo == "-"){
                $this->sql = "UPDATE cuentas_cooperativas SET saldo = (saldo - :saldo) WHERE id = :id";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
            }

            echo "EXITO ACTUALIZANDO LA CUENTA";
            echo "<br>";
            echo "<br>";

        }

        public function updating_balance_of_each_father_count($signo)
        {
            echo "El signo es: ". $signo."<br>";
            
            if ($signo == "+") {
                $this->sql = "SELECT mo.cuenta_id, mo.debe
                FROM movimientos mo
                ORDER BY mo.id DESC LIMIT 1";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute();
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($this->filas as $x) {
                    $this->dato = $x['cuenta_id'];
                    $this->numero = $x['debe'];
                }

                echo "El debe es: ". $this->numero. "<br>";
                echo "El id del concepto es: ". $this->dato. "<br>";

                
    
            }
            elseif ($signo == "-") {
                $this->sql = "SELECT mo.cuenta_id, mo.haber
                FROM movimientos mo
                ORDER BY mo.id DESC LIMIT 1";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute();
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($this->filas as $x) {
                    $this->dato = $x['cuenta_id'];
                    $this->numero = $x['haber'];
                }
    
                echo "El haber es: ". $this->numero. "<br>";
                echo "El id del concepto es: ". $this->dato. "<br>";

                //$this->updating_balance_of_each_father_count_II($this->dato, $this->numero);
            }            
            
            $data = [
                'id_concepto' => $this->dato,
            ];            

            $this->sql = "SELECT cc.id, signo 
            FROM cuentas_cooperativas cc, cuentas_conceptos coop, movimientos mo
            WHERE mo.cuenta_id = :id_concepto
            AND mo.cuenta_id = coop.id
            AND coop.cuentas_coop = cc.id
            LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            $datos = null;
            $signo_padre = null;

            foreach ($this->filas as $x) {
                $datos = $x['id'];
                $signo_padre = $x['signo'];
            }

            echo "El id de la cuenta a afectar el saldo es: ". $datos. "<br>";
            echo "El saldo a agregar o disminuir es: ". $this->numero."<br>";
            echo "El signo padre es: ". $signo_padre. "<br>";
            echo "El signo hijo el padre es: ". $signo. "<br>";

            $this->data = [
                'id' => $datos,
                'saldo' => $this->numero,
            ];

            if ($signo_padre == "=" && $signo == "+") {
                $this->sql = "UPDATE cuentas_cooperativas SET saldo = (saldo + :saldo) WHERE id = :id";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
            }
            elseif ($signo_padre == "=" && $signo == "-") {
                $this->sql = "UPDATE cuentas_cooperativas SET saldo = (saldo - :saldo) WHERE id = :id";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
            }

            echo "EXITO ACTUALIZANDO LA CUENTA";
            echo "<br>";
            echo "<br>";

        }



        //esto debe configurarse con para que ande con  la respectiva tabla
        public function movimientos_automaticos_factura($caja, $banco, $cuenta, $IVA, $Retenciones)
        {
            // este va!! inserta la cuenta hija ligada al concepto
            $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, parcial) 
            SELECT fa.comprobante_diario, fa.concepto, fa.Total FROM facturas fa ORDER BY id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            

            $this->updating_balance_of_each_count();

             
            // obtener el codigo, signo y grupo de la cuenta hja ligada al concepto para obtener la cuenta padre
            $this->sql = "SELECT caa.codigo, cc.signo, gr.grupo FROM facturas fa, cuentas_conceptos  cc, cuentas_cooperativas coop, catalogo caa, grupos gr 
            WHERE fa.concepto = cc.id AND cc.cuentas_coop = coop.id AND coop.cuenta = caa.id AND gr.id = caa.grupo ORDER BY fa.id DESC LIMIT 1 ";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->dato = $fila['codigo']; 
                $this->signo = $fila['signo'];   
                $this->grupo = $fila['grupo'];
            }

            //echo $this->dato. " , ". $this->signo. " , ". $this->grupo;
            //echo "<br>";
            $this->numero =  substr($this->dato, 0, 4);
            //echo $this->numero;
            
            $this->data = [
                'codigo' => $this->numero,
            ];

            $this->sql = "SELECT co.id, co.conceptos, co.signo 
            FROM cuentas_conceptos co, cuentas_cooperativas coop, catalogo caa
            WHERE co.cuentas_coop = coop.id AND coop.cuenta = caa.id AND co.signo = '=' AND caa.codigo = :codigo";
            $this->execute = $this->enlace->prepare($this->sql);             
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($this->filas as $fila) 
            {
                $this->comprobante = $fila['id']; 
            }

            $this->sql = "SELECT fa.comprobante_diario, fa.Total FROM facturas fa ORDER BY id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);             
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($this->filas as $fila) 
            {
                $this->documento = $fila['comprobante_diario'];
                $this->concepto = $fila['Total']; 
            }

            if ($this->signo == "+" ) {

                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'doc' => $this->comprobante,
                ];

                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, debe) 
                VALUES (:compro, :doc, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                echo "EXITO +";
                $this->updating_balance_of_each_father_count($this->signo);
            }
            elseif ($this->signo == "-") {
                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'doc' => $this->comprobante,
                ];

                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, haber) 
                VALUES (:compro, :doc, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                echo "EXITO -";
                $this->updating_balance_of_each_father_count($this->signo);
            }

            /**
              
              
              
            */
            if (($this->grupo == "egresos" || $this->grupo == "pasivos" || $this->grupo == "activos") && $caja == "110101" && $banco == null && $cuenta == null) {
                
                
                //echo "<br>";
                //echo "<br>";
                //echo $this->documento;
                //echo "<br>";
                //echo "<br>";
                //echo $this->concepto;

                // tomar datos de  la contracuenta
                $this->sql = "SELECT con.id, co.nombre_cooperativa, ca.codigo, ca.cuenta, cps.concepto, con.signo  
                FROM cuentas_conceptos con, cuentas_cooperativas coo, catalogo ca, cooperativa co, conceptos cps, grupos gr 
                WHERE con.cuentas_coop = coo.id AND ca.id = coo.cuenta AND co.id = coo.cooperativa AND cps.id = con.conceptos AND ca.grupo = gr.id AND gr.grupo = 'activos' AND con.signo = '-' AND ca.codigo = '110101' ORDER BY codigo ";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute();
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

                $signo_cuenta_hija = null;

                foreach ($this->filas as $fila) {
                    $this->id = $fila['id'];
                    $this->codigo = $fila['codigo'];
                    $signo_cuenta_hija = $fila['signo'];
                }
                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'cuentaid' => $this->id,
                ];
               // echo "<br>";
                
                //echo $this->id. " , ". $this->codigo;

                //insertar la contracuenta
                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, parcial) VALUES (:compro, :cuentaid, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                //echo "<br>";
                //echo "exito";
                //echo "<br>";
                $this->updating_balance_of_each_count();


                $this->codigo_recortado = substr($this->codigo, 0, 4);
                //echo "<br>";
                //echo $this->codigo_recortado;

                $this->data = [
                    'codr' => $this->codigo_recortado,
                ];
                $this->sql = "SELECT con.id, co.nombre_cooperativa, ca.codigo, ca.cuenta, cps.concepto, con.signo  
                FROM cuentas_conceptos con, cuentas_cooperativas coo, catalogo ca, cooperativa co, conceptos cps, grupos gr 
                WHERE con.cuentas_coop = coo.id AND ca.id = coo.cuenta AND co.id = coo.cooperativa AND cps.id = con.conceptos AND ca.grupo = gr.id AND gr.grupo = 'activos' AND con.signo = '=' AND ca.codigo = :codr ORDER BY codigo ";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

                foreach ($this->filas as $fila) {
                    $this->id = $fila['id'];
                }
                //echo "padre:". $this->id. $this->documento. $this->concepto;

                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'cuentaid' => $this->id,
                ];
                //insertar al padre
                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, haber) VALUES (:compro, :cuentaid, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                $this->updating_balance_of_each_father_count($signo_cuenta_hija);


            }
            elseif (($this->grupo == "egresos" || $this->grupo == "pasivos" || $this->grupo == "activos") && $caja == null && $banco == "1102" && $cuenta != null) {
                

                $this->data = [
                    'cuenta' => $cuenta,
                ];

                echo $cuenta;
                echo "<br>";

                $this->sql = "SELECT con.id, co.nombre_cooperativa, ca.codigo, ca.cuenta, cps.concepto, con.signo, coo.descripcion  
                FROM cuentas_conceptos con, cuentas_cooperativas coo, catalogo ca, cooperativa co, conceptos cps, grupos gr 
                WHERE con.cuentas_coop = coo.id AND ca.id = coo.cuenta AND co.id = coo.cooperativa AND cps.id = con.conceptos AND ca.grupo = gr.id AND gr.grupo = 'activos' AND con.signo = '-' AND coo.descripcion = :cuenta  ORDER BY codigo ";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

                $signo_cuenta_banco_hija = null;

                foreach ($this->filas as $fila) {
                    $this->id = $fila['id'];
                    $this->codigo = $fila['codigo'];
                    $signo_cuenta_banco_hija = $fila['signo'];                
                }
                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'cuentaid' => $this->id,
                ];

                echo $this->documento;
                echo "<br>";
                echo $this->concepto;
                echo "<br>";
                echo $this->id;
                echo "<br>";
                echo $this->codigo;
                echo "<br>";

                //insertar la contracuenta
                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, parcial) VALUES (:compro, :cuentaid, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);    

                $this->updating_balance_of_each_count();

                $this->codigo_recortado = $banco;

                $this->data = [
                    'codr' => $this->codigo_recortado,
                ];

                echo $this->codigo_recortado;
                echo "<br>";

                $this->sql = "SELECT con.id, co.nombre_cooperativa, ca.codigo, ca.cuenta, cps.concepto, con.signo  
                FROM cuentas_conceptos con, cuentas_cooperativas coo, catalogo ca, cooperativa co, conceptos cps, grupos gr 
                WHERE con.cuentas_coop = coo.id AND ca.id = coo.cuenta AND co.id = coo.cooperativa AND cps.id = con.conceptos AND ca.grupo = gr.id AND gr.grupo = 'activos' AND con.signo = '=' AND ca.codigo = :codr ORDER BY codigo ";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

                foreach ($this->filas as $fila) {
                    $this->id = $fila['id'];
                }              
                
                $this->data = [
                    'compro' => $this->documento,
                    'cant' => $this->concepto,
                    'cuentaid' => $this->id,
                ];

                echo "<br>";
                echo $this->documento;
                echo "<br>";
                echo $this->concepto;
                echo "<br>";
                echo $this->id;


                $this->sql = "INSERT INTO movimientos (comprobante_id, cuenta_id, haber) VALUES (:compro, :cuentaid, :cant)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);

                $this->updating_balance_of_each_father_count($signo_cuenta_banco_hija);

            }
            
            $this->seleccionar_id_comprobante_para_sumas_iguales();
           
        }

        public function seleccionar_id_comprobante_para_sumas_iguales()
        {
            $this->sql = "SELECT id FROM comprobante_diario ORDER BY id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->dato = $fila['id'];    
            }

            //tomar el dato del ultimo id de comprobante de diario

            $this->data = [
                'compro' => $this->dato,
            ];

            $this->sql = "SELECT SUM(debe) FROM movimientos WHERE comprobante_id = :compro";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->debe = $fila['SUM(debe)'];    
            }
            
            $this->sql = "SELECT SUM(haber) FROM movimientos WHERE comprobante_id = :compro";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->haber = $fila['SUM(haber)'];    
            }

            if ($this->debe == $this->haber) {
                    $this->data = [
                        'debe' => $this->debe,
                        'haber' => $this->haber,
                        'compro' => $this->dato,
                    ];
        
                    $this->sql = "UPDATE comprobante_diario 
                    SET sumasIguales = (:debe - :haber) 
                    WHERE id = :compro";
                    $this->execute = $this->enlace->prepare($this->sql);
                    $this->execute->execute($this->data);
                    echo $x = "Exito en las sumas iguales!!";
                    return $x;
            }
            else{
                    echo $x = "Error en las sumas iguales";
                    return $x;              
            }
        }

        //la estan enlazados los conceptos
        public function insertar_factura_con_comprobante_diario(
            $vNumeroFactura,$vTipoMoneda,$vFecha,$vProveedor,$vRUC,$vIdCuentaConcepto,
            $vBaucher,$vTipoPago,$vSubtotal,$vIVA,$vTotal,$vIdCooperativa,
            $vProductos, $vCuenta_banco)
        {
            //llamar al metodo para insertar comprobante diario
            $this->insertar_comprobante_diario($vFecha,$vIdCooperativa,$vIdCuentaConcepto);
            //saca el ultimo comprobante de diario insertado
            $this->sql = "SELECT id FROM comprobante_diario ORDER BY id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->dato = $fila['id'];    
            }
            //tomar el dato del ultimo id de comprobante de diario que se insertó

            $this->data = [
                'numFactura' => $vNumeroFactura,
                'tipoMoneda' => $vTipoMoneda,
                'fecha'=>$vFecha,
                'proveedor' => $vProveedor,
                'RUC' => $vRUC,
                'idCuentaConcepto' => $vIdCuentaConcepto,
                //esto se debe definir
                'baucher' => $vBaucher,
                'tipoPago' => $vTipoPago,
                'subtotal' => $vSubtotal,
                'iva' => $vIVA,
                'total'=> $vTotal,
                //esto es el numero de asiento
                'compro' => $this->dato,
                'cuentabanco' => $vCuenta_banco,
            ];


            $this->sql = "INSERT INTO `multipro`.`facturas` 
            (`numero`, `tipoMoneda`, `fecha`, `proveedor`, `RUC`, `concepto`, `baucher`, 
             `cuentabanco`, `tipoPago`, `subtotal`, `IVA`, `Total`, `comprobante_diario`)
            VALUES (:numFactura, :tipoMoneda, :fecha, :proveedor, :RUC, :idCuentaConcepto, :cuentabanco, :baucher, :tipoPago, :subtotal, :iva, :total, :compro)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            
            //saca la ultima factura insertado
            $this->sql = "SELECT id FROM facturas ORDER BY id DESC LIMIT 1";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->dato = $fila['id'];    
            }
            $idFactura=$this->dato;
            echo "<br>";
            echo "<br>";
            echo "ID de la factura insertada";
            echo "<br>";
            echo "<br>";
            echo $vTipoPago;
            echo "<br>";
            echo "La cuenta de banco es: ";
            echo "<br>";
            echo $vBaucher;
            echo "<br>";
            echo "<br>";
            echo "Cuenta de la factura insertada";
            
            $this->insertar_productos($vProductos,$idFactura);

            echo 'REVISAR LA BASE DE DATOS';
            
            if ($vTipoPago == "110101") {
                $this->movimientos_automaticos_factura( $vTipoPago, null,null, null, null);
            }
            elseif ($vTipoPago == "1102" && $vBaucher != null) {
                $this->movimientos_automaticos_factura(null, $vTipoPago, $vBaucher, null, null);
            }
            

        }

        public function insertar_comprobante_diario($vFecha,$vIdCooperativa,$vIdCuentaConcepto)
        {
            //$objto = new Comprobante();
            
            $this->data = [
                //esto genera el numero de asiento
                'asiento' => $this->get_current_date_and_asiento_number($vIdCooperativa,$vFecha),
                'fecha' => $vFecha,
                'coop' => $vIdCooperativa,
                'detalle' => $vIdCuentaConcepto,
            ];

            $this->sql = "INSERT INTO `multipro`.`comprobante_diario` (`asiento`, `fecha`, `cooperativa_id`, `detalle_id`) 
            VALUES (:asiento, :fecha, :coop, :detalle)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);            
        }

        public function get_current_date_and_asiento_number($vIdCooperativa,$vFecha)
        {
            $vFecha = date("m",strtotime($vFecha));
            $this->data = [
                'fecha' => $vFecha,
                'cooperativa' => $vIdCooperativa, 
            ];
            $this->sql = "SELECT COUNT(fecha) FROM comprobante_diario WHERE MONTH(fecha) = :fecha AND cooperativa_id = :cooperativa";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

            foreach ($this->filas as $fila) 
            {
                $this->dato = $fila['COUNT(fecha)'];    
            }

           // echo $this->dato;

           // echo "<br>";

            $this->asiento = $this->dato + 1;

            //echo $this->asiento;

            return $this->asiento;
        }

        public function insertar_productos($vProductos,$vIdFactura)
        {
            foreach ($vProductos as $producto) {
                # code...
                /*echo '<br>'.$producto['id'].'<br>';
                echo $producto['cantidad'].'<br>';
                echo $producto['descripcion'].'<br>';
                echo $producto['unidadMedida'].'<br>';
                echo $producto['precioUnitario'].'<br>';
                echo $producto['total'].'<br>';*/

                $descripcion = $producto['descripcion'].' UNIDAD DE MEDIDA:'.$producto['unidadMedida'];
                $this->data = [
                    'cantidad' => $producto['cantidad'],
                    'descripcion' => $descripcion,
                    'precio'=>$producto['precioUnitario'],
                    'total' => $producto['total'],
                    'idFactura' => $vIdFactura,
                    
                ];
    
                $this->sql = "INSERT INTO `multipro`.`detallesfactura` 
                (`cantidad`, `descripcion`, `precio`, `total`, `idfactura`)
                VALUES (:cantidad, :descripcion, :precio, :total, :idFactura)";
                $this->execute = $this->enlace->prepare($this->sql);
                $this->execute->execute($this->data);
            }
        }

    }
    $json='[{"id":1,"cantidad":"2","descripcion":"marcador color azul","unidadMedida":"unidad","precioUnitario":"13","total":"26"},
    {"id":2,"cantidad":"2","descripcion":"papelografo","unidadMedida":"unidad","precioUnitario":"15","total":"30"}]';
    /*$productos = array(
        "cantidad"=>'1',
        "descripcion"=>'papelografo de papel bond',
        "precio"=>'15',
        "total"=>'15'
    );*/
    //$productos = json_decode($json,true);

    //var_dump($productos);
    //$objeto= new Facturas();
    //$objeto->test();
    //$objeto->insertar_factura_con_comprobante_diario('1','C$','2019-09-11','MAYON','RUC-MAYON','15','PAPEL BOND','110101','EFECTIVO','15','2','17','81', $productos, null);
?>