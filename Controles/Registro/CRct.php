<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Rct.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerRCT.php";
$direccionGuardar = "location: ../../Vistas/GuardarRCT.php";


if (isset($_POST['hidden_rct'])) {

    $accion = $_POST['hidden_rct'];
    $fecha_ejecucion=null;
     $nombrearchivo = null;
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {
       
        if (isset($_SESSION['accion_rct'])) {
            if ($_SESSION['accion_rct'] == 'editar') {
              $id= $_POST['idrct']; 
               $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            
            
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
            $idcliente = $_POST['c_cliente'];
                                       
            $ob_rct = new Rct();
            $ob_rct->setId($id);
            $ob_rct->setIdcliente($idcliente);
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            $valor=$ob_rct->actualizar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
            } else {
               $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            
            
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
            $idcliente = $_POST['c_cliente'];
                                       
            $ob_rct = new Rct();
            $ob_rct->setIdcliente($idcliente);
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            $valor=$ob_rct->grabar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
            }
        } else {
            $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
            $idcliente = $_POST['c_cliente'];
                                       
            $ob_rct = new Rct();
            $ob_rct->setIdcliente($idcliente);
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            $valor=$ob_rct->grabar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idrct'];
        $ob_req = new Rct();
        $ob_req->setId($id_dato); 
        $ob_req->buscarPorId($ob_req);
        $_SESSION['accion_rct']='editar';
        unset($_SESSION['arreglo_buscado_rct']);
        header("location: ../../Vistas/GuardarRCT.php");
     }

     
     else if($accion=='buscar')
    {
        $idcliente= $_POST['c_cliente'];
        $tipo= $_POST['c_tipo'];        
        $detalle= $_POST['ta_detalle'];
        $estado= $_POST['c_estado'];              
        
        $ob_rct = new Rct();
        $ob_rct->setIdcliente($idcliente);
        $ob_rct->setTipo($tipo);
        $ob_rct->setDetalle($detalle);
        $ob_rct->setEstado($estado);
        $ob_rct->setIdusu($_SESSION['id_username']);
         
        $arreglo = $ob_rct->buscar($ob_rct);
        
        $_SESSION['arreglo_buscado_rct'] = $arreglo;
        $_SESSION['accion_rct'] = 'busqueda';
        header("location: ../../Vistas/MantenerRCT.php");
    }
} else {
    header("location: ../../Vistas/Registros/serv_GuardarUsuario.php");
}
