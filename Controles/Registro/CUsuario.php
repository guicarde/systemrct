<?php
session_start();
include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Usuario.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerUsuario.php";
$direccionGuardar = "location: ../../Vistas/GuardarUsuario.php";

if(isset($_POST['hidden_usuario']))
{
   
    $accion = $_POST['hidden_usuario'];

    if($accion=='save')
    {   
        
        if(isset($_SESSION['accion_usuario']))
            {
                 if($_SESSION['accion_usuario']=='editar')
                 {
                    $id = $_POST['idusu'];
                    if(($_FILES['fileArchivo']['name'])==""){                       
                      $nombrearchivo = $_SESSION['usu_foto'];
                    }
                    else 
                    {
                    $nombrearchivo = $_FILES['fileArchivo']['name'];
                    move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Fotos/" . $nombrearchivo);    
                    } 
                    $nombres     = trim(strtoupper($_POST['t_nombres'])); 
                    $apellidos     = trim(strtoupper($_POST['t_apellidos']));  
                    $numdoc     = trim(strtoupper($_POST['t_numdoc']));
                    $usuario     = trim(strtoupper($_POST['t_user']));
                    $email = trim(strtoupper($_POST['t_email']));
                    $rol = $_POST['c_rol'];                    
                    
                    $ob_usuario = new Usuario();
                    $ob_usuario->setId($id);
                    $ob_usuario->setNombres($nombres);
                    $ob_usuario->setApellidos($apellidos);
                    $ob_usuario->setNumdoc($numdoc);
                    $ob_usuario->setUsuario($usuario);
                    $ob_usuario->setEmail($email);
                    $ob_usuario->setFoto($nombrearchivo);
                    $ob_usuario->setRol($rol);
            
            
                    $ob_usuario->actualizar($ob_usuario);
                    header("location: ../../Vistas/MantenerUsuario.php");
                 }
                 else
                 {
                    if(($_FILES['fileArchivo']['name'])==""){                       
                      $nombrearchivo = "guille.jpg";
                    }else 
                    {
                    $nombrearchivo = $_FILES['fileArchivo']['name'];
                    move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Fotos/" . $nombrearchivo);    
                    }
                    $nombres     = trim(strtoupper($_POST['t_nombres'])); 
                    $apellidos     = trim(strtoupper($_POST['t_apellidos']));  
                    $numdoc     = trim(strtoupper($_POST['t_numdoc']));
                    $usuario     = trim(strtoupper($_POST['t_user']));
                    $email = trim(strtoupper($_POST['t_email']));
                    $rol = $_POST['c_rol'];                    
                    
                    $ob_usuario = new Usuario();
                    $ob_usuario->setNombres($nombres);
                    $ob_usuario->setApellidos($apellidos);
                    $ob_usuario->setNumdoc($numdoc);
                    $ob_usuario->setUsuario($usuario);
                    $ob_usuario->setEmail($email);
                    $ob_usuario->setFoto($nombrearchivo);
                    $ob_usuario->setRol($rol);
            
            
                    $ob_usuario->grabar($ob_usuario);
                    header("location: ../../Vistas/MantenerUsuario.php");
                 }
           }
           else 
            {
                    if(($_FILES['fileArchivo']['name'])==""){                       
                      $nombrearchivo = "guille.jpg";
                    }else 
                    {
                    $nombrearchivo = $_FILES['fileArchivo']['name'];
                    move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Fotos/" . $nombrearchivo);    
                    }
                    $nombres     = trim(strtoupper($_POST['t_nombres'])); 
                    $apellidos     = trim(strtoupper($_POST['t_apellidos']));  
                    $numdoc     = trim(strtoupper($_POST['t_numdoc']));
                    $usuario     = trim(strtoupper($_POST['t_user']));
                    $email = trim(strtoupper($_POST['t_email']));
                    $rol = $_POST['c_rol'];                    
                    
                    $ob_usuario = new Usuario();
                    $ob_usuario->setNombres($nombres);
                    $ob_usuario->setApellidos($apellidos);
                    $ob_usuario->setNumdoc($numdoc);
                    $ob_usuario->setUsuario($usuario);
                    $ob_usuario->setEmail($email);
                    $ob_usuario->setFoto($nombrearchivo);
                    $ob_usuario->setRol($rol);
            
            
                    $ob_usuario->grabar($ob_usuario);
                    header("location: ../../Vistas/MantenerUsuario.php");
            }
        }
    
     else if($accion=='buscar')
    {
           
            
        $nombres = trim(strtoupper($_POST['t_nombres']));
        $apellidos = trim(strtoupper($_POST['t_apellidos']));
        $estado = $_POST['c_estado'];
        $fechareg=trim(strtoupper($_POST['t_fecha_reg']));
        
        $ob_usuario = new Usuario();
        $ob_usuario->setNombres($nombres);
        $ob_usuario->setApellidos($apellidos);
        $ob_usuario->setEstado($estado);
        $ob_usuario->setFecha_registro($fechareg);
         
        $arreglo = $ob_usuario->buscar($ob_usuario);
        
        $_SESSION['arreglo_buscado_usuario'] = $arreglo;
        $_SESSION['accion_usuario'] = 'busqueda';
        header("location: ../../Vistas/MantenerUsuario.php");
    }
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idusu'];
        $ob_usuario = new Usuario();
        $ob_usuario->setId($id_dato); 
        $ob_usuario->buscarPorId($ob_usuario);
        $_SESSION['accion_usuario']='editar';
        unset($_SESSION['arreglo_buscado_usuario']);
        header("location: ../../Vistas/GuardarUsuario.php");
     }
         else if($accion == 'anular'){
        $id_usuario_eliminar = $_POST['id_hidden_eliminar'];
        $id_usuario_estado = $_POST['hidden_estado'];
        $ob_usuario = new Usuario();
        $ob_usuario->setId($id_usuario_eliminar);
        $ob_usuario->setEstado($id_usuario_estado);
        $ob_usuario->anular($ob_usuario);
        
        $arreglo=$ob_usuario->listar();
        $_SESSION['arreglo_buscado_usuario'] = $arreglo;
        header("location: ../../Vistas/MantenerUsuario.php");
         }
    else if($accion == 'cambiarcontrasenia'){
        $pass = md5($_POST['pwd2']);
        $id_usuario = $_POST['idusu'];
        $ob_usuario = new Usuario();
        $ob_usuario->setId($id_usuario);
        $ob_usuario->setContrasenia($pass);
        $valor=$ob_usuario->cambiar_pass($ob_usuario);
        $_SESSION = array();
        header("location: ../../Vistas/index.php");
         }
   }
    
else 
{
    header("location: ../../Vistas/GuardarUsuario.php");
         
}