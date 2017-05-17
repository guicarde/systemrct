<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Rol {
    
    private $id;
    private $descripcion;
    private $estado;
    private $fecharegistro;
    private $idcliente;
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getDescripcion() {
    return $this->descripcion;
}

function getEstado() {
    return $this->estado;
}

function getFecharegistro() {
    return $this->fecharegistro;
}

function setId($id) {
    $this->id = $id;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}
function getIdcliente() {
    return $this->idcliente;
}

function setIdcliente($idcliente) {
    $this->idcliente = $idcliente;
}








//------------------------------------------------------------------------------
   function grabar(Rol $r){
        $con =  Conectar();
        $sql = "SELECT * FROM cliente_por_rol_insertar($r->id,$r->idcliente)";
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_rol']="El Nombre Ingresado ya esta Registrado"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_rol']="Los datos se registraron satisfactoriamente"; 
            return 1;
        }
    }

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM rol_listar()";
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
        $sql = "SELECT * FROM rol_listar_sin_cli()";
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
        function buscarPorId(Rol $r){
        $con = Conectar();
        $sql = "SELECT * FROM rol_buscar_por_id($r->id)";
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
                $_SESSION['rol_idrol'] = $a['rol_idrol'] ;
                $_SESSION['rol_nombre'] = $a['rol_nombre'];
                $_SESSION['rol_estado'] = $a['rol_estado'];
                $_SESSION['rol_fecharegistro'] = $a['rol_fecharegistro'];
                $_SESSION['accion_rol'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
      function eliminar(Rol $r)
    {
        $con = Conectar();
        $sql = "select * from clientes_por_rol_eliminar($r->id)";
//        var_dump($sql);
//        exit();
        pg_query($con,$sql);
    }
    
  
    }