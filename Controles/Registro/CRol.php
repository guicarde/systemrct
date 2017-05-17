<?php
session_start();
include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Rol.php';
//include_once '../../DAO/Registro/Menu.php';
include_once '../../DAO/Registro/Cliente.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerClienteRol.php";
$direccionGuardar = "location: ../../Vistas/AsignarClienteRol.php";

if(isset($_POST['hidden_rol']))
{
   
    $accion = $_POST['hidden_rol'];
//    var_dump($accion);
//    exit();
    if($accion=='save')
    {   
        
        if(isset($_SESSION['accion_rol']))
            {
                 if($_SESSION['accion_rol']=='editar')
                 {
                    $idrol = $_POST['c_rol'];
                    
                    $ob_rol = new Rol();
                    $ob_rol->setId($idrol);
                    
                    $ob_rol->eliminar($ob_rol);
              
                    if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_rol = new Rol();
                    
                    $ob_rol->setId($idrol);
                    $ob_rol->setIdcliente($selected);                
                    $valor = $ob_rol->grabar($ob_rol);
                    }
                    }
                    
                    if ($valor == 1) {
                       header($direccionMantener);
                       unset($_SESSION['accion_rol']);
                       } else {
                       header($direccionMantener);
                       }
                        }
                 else
                 {
                    $idrol = $_POST['c_rol'];
                    
                    $ob_rol = new Rol();
                    $ob_rol->setId($ob_rol);
                    
                    $ob_rol->eliminar($ob_rol);
              
                    if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_rol = new Rol();
                    
                    $ob_rol->setId($idrol);
                    $ob_rol->setIdcliente($selected);                
                    $valor = $ob_rol->grabar($ob_rol);
                    }
                    }
                    
                    if ($valor == 1) {
                       header($direccionMantener);
                       unset($_SESSION['accion_rol']);
                       } else {
                       header($direccionMantener);
                       }
                 }
           }
           else 
            {
                    $idrol = $_POST['c_rol'];
                    
                    $ob_rol = new Rol();
                    $ob_rol->setId($ob_rol);
                    
                    $ob_rol->eliminar($ob_rol);
              
                    if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_rol = new Rol();
                    
                    $ob_rol->setId($idrol);
                    $ob_rol->setIdcliente($selected);                
                    $valor = $ob_rol->grabar($ob_rol);
                    }
                    }
                    
                    if ($valor == 1) {
                       header($direccionMantener);
                       unset($_SESSION['accion_rol']);
                       } else {
                       header($direccionMantener);
                       }
        
            }
        }
    
     else if($accion=='buscar')
    {
           
            
        $dato = trim(strtoupper($_POST['t_nombre']));
        $rol = $_POST['c_rol'];
        $menu = $_POST['c_menu'];
        $estado = $_POST['c_estado'];
        $fechareg=trim(strtoupper($_POST['t_fecha_reg']));
        
        $ob_privilegio = new Privilegio();
        $ob_privilegio->setNombreusu($dato);
        $ob_privilegio->setIdrol($rol);
        $ob_privilegio->setIdmenu($menu);
        $ob_privilegio->setEstado($estado);
        $ob_privilegio->setFecha_registro($fechareg);
         
        $arreglo = $ob_privilegio->buscar($ob_privilegio);
        
        $_SESSION['arreglo_buscado_rol'] = $arreglo;
        $_SESSION['accion_rol'] = 'busqueda';
        header("location: ../../Vistas/MantenerClienteRol.php");
    }
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idrol'];
        $ob_rol = new Rol();
        $ob_rol->setId($id_dato); 
        $ob_rol->buscarPorId($ob_rol);
        $_SESSION['accion_rol']='editar';
        unset($_SESSION['arreglo_buscado_rol']);
        header("location: ../../Vistas/AsignarClienteRol.php");
     }  
   }    
else 
{
    header("location: ../../Vistas/AsignarPrivilegios.php");
         
}