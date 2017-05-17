<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Usuario {
    
    private $id;
    private $nombres;
    private $apellidos;
    private $numdoc;
    private $usuario;
    private $contrasenia;
    private $estado; 
    private $email;
    private $foto;
    private $fecha_registro;
    private $rol;
    
    function __construct() {}
function getId() {
    return $this->id;
}

function getNombres() {
    return $this->nombres;
}

function getApellidos() {
    return $this->apellidos;
}

function getNumdoc() {
    return $this->numdoc;
}

function getUsuario() {
    return $this->usuario;
}

function getContrasenia() {
    return $this->contrasenia;
}

function getEstado() {
    return $this->estado;
}

function getEmail() {
    return $this->email;
}

function getFoto() {
    return $this->foto;
}

function getFecha_registro() {
    return $this->fecha_registro;
}

function getRol() {
    return $this->rol;
}

function setId($id) {
    $this->id = $id;
}

function setNombres($nombres) {
    $this->nombres = $nombres;
}

function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

function setNumdoc($numdoc) {
    $this->numdoc = $numdoc;
}

function setUsuario($usuario) {
    $this->usuario = $usuario;
}

function setContrasenia($contrasenia) {
    $this->contrasenia = $contrasenia;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setEmail($email) {
    $this->email = $email;
}

function setFoto($foto) {
    $this->foto = $foto;
}

function setFecha_registro($fecha_registro) {
    $this->fecha_registro = $fecha_registro;
}

function setRol($rol) {
    $this->rol = $rol;
}



  
//------------------------------------------------------------------------------
    function grabar(Usuario $usu){
          
         $con = Conectar();
         
         $pass = md5('123456');
         
         //verificar si usuario esta registrado --------------------------------
         $sql = "SELECT * FROM usu_verificarexistencia('$usu->usuario')";
         
         $res = pg_query($con,$sql);
         $cont=0;
            while($fila = pg_fetch_assoc($res))
            {
                      $cont++;
            }
         ///--------------------------------------------------------------------   
         
         if($cont!=0)
         {
             $_SESSION['mensaje_usuario']='Este usuario ya está registrado';
             return 'error';
         }
         else
         {
            $sql = "select * from usu_insertar('$usu->nombres','$usu->apellidos','$usu->numdoc','$usu->usuario','$pass','$usu->email',$usu->rol,'$usu->foto')";
//            var_dump($sql);
//            exit();
            pg_query($con,$sql);
            
            $_SESSION['mensaje_usuario']='Usuario registrado correctamente';
            
         }
    }
    
        function buscar(Usuario $usu)
    {
         $con = Conectar();
         $sql = "SELECT * FROM usu_buscar('%$usu->nombres%','%$usu->apellidos%','$usu->estado','$usu->fecha_registro')";
//         var_dump($sql);
//         exit();
         
         $res = pg_query($con,$sql);
         $array=null;
         
         while($fila = pg_fetch_assoc($res))
         {
               $array[] = $fila;
         }
         if(count($array)!=0){
             return $array; 
         }
         else{
         return null;
         }
    }
    
    
    

    function buscarPorId(Usuario $usu){
        $con = Conectar();
        $sql = "SELECT * FROM usu_buscar_por_id($usu->id)";
        $res = pg_query($con,$sql);
        $array = null;
        while($fila = pg_fetch_assoc($res))
        {
            $array[]=$fila;
        }
         if(count($array)!=0)
         {
            
          foreach($array as $a)
            {
                $_SESSION['usu_idusu'] = $a['usu_idusu'] ;
                $_SESSION['usu_nombres_usuario'] = $a['usu_nombres_usuario'];
                $_SESSION['usu_apellidos_usuario'] = $a['usu_apellidos_usuario'];
                $_SESSION['usu_numdoc_usuario'] = $a['usu_numdoc_usuario'];
                $_SESSION['usu_nom_usuario'] = $a['usu_nom_usuario'];
                $_SESSION['usu_contrasenia'] = $a['usu_contrasenia'];
                $_SESSION['usu_estado'] = $a['usu_estado'];
                $_SESSION['usu_foto'] = $a['usu_foto'];
                $_SESSION['usu_email_institucional'] = $a['usu_email_institucional'];
                $_SESSION['usu_fecharegistro'] = $a['usu_fecharegistro'];
                $_SESSION['rol_idrol'] = $a['rol_idrol'];
                $_SESSION['accion_usuario'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
    
  
   function anular(Usuario $usu){
        $con = Conectar();
        $sql = "SELECT * FROM usu_anular('$usu->estado',$usu->id)";  
        pg_query($con,$sql); 
    } 

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM usu_listar()";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
        function listar_conectado(Usuario $usu){
       
        $con = Conectar();
        $sql = "SELECT * FROM usu_listar_conectados($usu->id)";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
    
    function listar_sin_privilegios(){
       
        $con = Conectar();
        $sql = "SELECT * FROM usu_listar_sin_priv()";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
    
    function actualizar(Usuario $usu)
    {
        $con =  Conectar();
        $sql = "select * from usu_editar('$usu->nombres','$usu->apellidos','$usu->numdoc','$usu->usuario','$usu->email',$usu->id,$usu->rol,'$usu->foto')";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_usuario']="Algun(os) datos ya estan registrados"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_usuario']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
    }
        function cambiar_pass(Usuario $usu)
    {
        $con =  Conectar();
        $sql = "select * from usu_cambiar_pass('$usu->contrasenia',$usu->id)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_usuario']="Algun(os) datos ya estan registrados"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_usuario']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
    }
 function eliminar(Usuario $usu)
    {
        $con = Conectar();
        $sql = "select * from usu_eliminar($usu->id)";
        pg_query($con,$sql);
    }
    
    function restablecerPass(Usuario $usu){
        $con = Conectar();
            $pass = md5('123456');
            $sql = "select * from usu_restablecer_pass($usu->id,'$pass')";
            pg_query($con,$sql);
            $_SESSION['mensaje_usuario']="Contraseña restablecida correctamente";
    }
    
     function conectado(Usuario $usu){
        $con = Conectar();
        $sql = "SELECT * FROM usu_sesion_conectado($usu->id)";  
        pg_query($con,$sql); 
    } 
         function desconectado(Usuario $usu){
        $con = Conectar();
        $sql = "SELECT * FROM usu_sesion_desconectado($usu->id)";  
        pg_query($con,$sql); 
    } 
    
}
