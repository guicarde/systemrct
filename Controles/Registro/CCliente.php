<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Cliente.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerCliente.php";
$direccionGuardar = "location: ../../Vistas/GuardarCliente.php";


if (isset($_POST['hidden_cliente'])) {

    $accion = $_POST['hidden_cliente'];
    
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {

        if (isset($_SESSION['accion_cliente'])) {
            if ($_SESSION['accion_cliente'] == 'editar') {
                $id = $_POST['idcli'];
                $nombre = trim(strtoupper($_POST['t_cliente']));
                       
                $ob_cliente = new Cliente();
                $ob_cliente->setId($id);
                $ob_cliente->setNombre($nombre);
                $valor=$ob_cliente->actualizar($ob_cliente);
            
                if ($valor == 1) {
                    header($direccionMantener);
                } else {
                    header($direccionGuardar);
                }
            } else {
            $nombre = trim(strtoupper($_POST['t_cliente']));
                       
            $ob_cliente = new Cliente();
            $ob_cliente->setNombre($nombre);
            $valor=$ob_cliente->grabar($ob_cliente);
            
                      
            header("location: ../../Vistas/MantenerCliente.php");
            }
        } else {
           $nombre = trim(strtoupper($_POST['t_cliente']));
                       
            $ob_cliente = new Cliente();
            $ob_cliente->setNombre($nombre);
            $valor=$ob_cliente->grabar($ob_cliente);
            
                      
            header("location: ../../Vistas/MantenerCliente.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idcli'];
        $ob_cliente = new Cliente();
        $ob_cliente->setId($id_dato); 
        $ob_cliente->buscarPorId($ob_cliente);
        $_SESSION['accion_cliente']='editar';
        unset($_SESSION['arreglo_buscado_cliente']);
        header("location: ../../Vistas/GuardarCliente.php");
     }
     
     else if($accion=='buscar')
    {
        $desc = trim(strtoupper($_POST['t_cliente']));
        $estado = $_POST['c_estado'];
        $fechareg=$_POST['t_fecha_reg'];
        
        $ob_cliente = new Cliente();
        $ob_cliente->setNombre($desc);
        $ob_cliente->setEstado($estado);
        $ob_cliente->setFecharegistro($fechareg);
         
        $arreglo = $ob_cliente->buscar($ob_cliente);
        
        $_SESSION['arreglo_buscado_cliente'] = $arreglo;
        $_SESSION['accion_cliente'] = 'busqueda';
        header("location: ../../Vistas/MantenerCliente.php");
    }
        
    else if($accion == 'anular'){
        $id_cliente_eliminar = $_POST['id_hidden_eliminar'];
        $id_cliente_estado = $_POST['hidden_estado'];
        $ob_cliente = new Cliente();
        $ob_cliente->setId($id_cliente_eliminar);
        $ob_cliente->setEstado($id_cliente_estado);
        $ob_cliente->anular($ob_cliente);
        
        $arreglo=$ob_cliente->listar();
        $_SESSION['arreglo_buscado_cliente'] = $arreglo;
        header("location: ../../Vistas/MantenerCliente.php");
         }
} else {
    header("location: ../../Vistas/Registros/sin_accesos.php");
}
