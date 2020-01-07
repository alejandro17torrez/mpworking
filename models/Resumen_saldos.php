<?php

    use ___PHPSTORM_HELPERS\PS_UNRESERVE_PREFIX_this;

    require "../conexion/conexion.php";


    class Saldos 
    {
        private $conexion, $enlace, $sql, $execute, $data, $filas;

        /**
         * Class constructor.
         */
        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->enlace = $this->conexion->Conectar();
            $this->sql = null;
            $this->data = null;
            $this->execute = null;
            $this->filas = null;
        }

    
        public function verTotalSaldoGruposPorMes($vidCooperativa,$vMes)
        {
            //consulta para sacar todos los grupos
            $this->sql = "SELECT gr.grupo FROM grupos gr";
            $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $this->execute->execute();
            $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
            //instanciar el resultado de la consulta a un array
            $grupo = $this->filas;
            $saldosGrupos=array();
            
            foreach ($grupo as $gr) {
               $this->data = [
                   'grupos' => $gr['grupo'],
                   'idCoop' => $vidCooperativa,
                   'mes'=>$vMes,
               ];
               //esta consulta saca el saldo por grupo de cuentas dado un determinado grupo y un mes
               $this->sql = "SELECT IFNULL(gr.grupo,'SIN TUPLA') AS 'grupo',  (IFNULL(SUM(mo.debe), 0) -  IFNULL(SUM(mo.haber), 0)) AS saldo_grupos
               FROM movimientos mo, 
               comprobante_diario cd,
               cuentas_conceptos cc,
               cuentas_cooperativas coop,
               catalogo cat,
               cooperativa cop,
               conceptos copt,
               grupos gr
               WHERE mo.comprobante_id = cd.id
               AND cd.cooperativa_id = cop.id
               AND cd.cooperativa_id = :idCoop
               AND mo.cuenta_id = cc.id
               AND cc.cuentas_coop = coop.id
               AND cc.conceptos = copt.id
               AND coop.cuenta = cat.id
               AND coop.cooperativa = cop.id
               AND cat.grupo = gr.id
               AND MONTH(cd.fecha) = :mes
               AND gr.grupo = :grupos ";
               $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               $this->execute->execute($this->data);
               $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
               $saldoTuplaGrupo=$this->filas[0]['saldo_grupos'];
               $saldosGrupos[]=
                array('GRUPO'=>$gr['grupo'],
                    'saldo'=>$saldoTuplaGrupo);
            }
            //convertir los datos del array a json
            $jsonDatosSaldosPorGrupos= json_encode($saldosGrupos);
            //ahora a llamar el total de saldos de grupos por mes
            $this->verTotalSaldoCuentasMayoresPorMes($vidCooperativa,$vMes,$jsonDatosSaldosPorGrupos);
        }

        public function verTotalSaldoCuentasMayoresPorMes($vidCooperativa,$vMes,$vJsonDatosSaldoGrupos)
        {
            $this->data = [
                'idCoop' => $vidCooperativa,
                'mes'=>$vMes,
            ];

               $this->sql = "SELECT cat.codigo, cat.cuenta, (IFNULL(mo.debe, 0) - IFNULL(mo.haber, 0)) AS 'saldos' 
               FROM movimientos mo,
               comprobante_diario cd,
               cooperativa cop,
               cuentas_conceptos cc,
               catalogo cat,
               grupos gr,
               cuentas_cooperativas coop
               WHERE mo.comprobante_id = cd.id
               AND cd.cooperativa_id = cop.id
               AND mo.cuenta_id = cc.id
               AND cc.cuentas_coop = coop.id
               AND coop.cuenta = cat.id
               AND cat.grupo = gr.id
               AND cd.cooperativa_id = :idCoop
               AND MONTH(cd.fecha) = :mes
               AND cc.signo = '=' ORDER BY cat.codigo";
               $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               $this->execute->execute($this->data);
               $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

               $totales_cuentas_mayores = $this->filas;
                $this->data = [
                    'idCoop' => $vidCooperativa,
                ];
                
                $this->sql = "SELECT cat.cuenta, cat.codigo
                FROM catalogo cat, cuentas_conceptos cc, cuentas_cooperativas cop
                WHERE cc.cuentas_coop = cop.id
                AND cop.cuenta = cat.id
                AND cc.signo = '='
                AND cop.cooperativa = :idCoop ORDER BY cat.codigo";
                $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $this->execute->execute($this->data);
                $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);

                $codigos_cuentas_padres = $this->filas;
                //este array va ser el que almacene los datos para la tabla
                $sumatoriaCuentastotal=array();
                $sumatoriaCuenta = 0;
                //iterando los array para realizar la sumatoria de cuentas
                foreach ($codigos_cuentas_padres as $cuenta) {
                    foreach ($totales_cuentas_mayores as $saldoTupla) {
                        if($cuenta['codigo']==$saldoTupla['codigo']){
                            //coinciden las cuentas debe ser sacado
                            $sumatoriaCuenta=$sumatoriaCuenta+$saldoTupla['saldos'];
                        }
                        
                    }
                    //echo "<br>CUENTA:".$cuenta['cuenta'].", CÓDIGO:".$cuenta['codigo'].", SALDO TOTAL:".$sumatoriaCuenta;
                    $sumatoriaCuentastotal[] = 
                        array('codigo'=>$cuenta['codigo'],
                        'descripcion'=>$cuenta['cuenta'],
                        'total'=>$sumatoriaCuenta);
                    $sumatoriaCuenta = 0;
                }
                $JsonSaldosPorCuentaMayor = json_encode($sumatoriaCuentastotal);
                //esto ya es con miras a pasar datos a javascript
                $respuestaServidor = array();
                $respuestaServidor[] = array(
                    'grupos'=>$vJsonDatosSaldoGrupos,
                    'padres'=>$JsonSaldosPorCuentaMayor
                );
                echo json_encode($respuestaServidor);
            }
            
    }
    
?>