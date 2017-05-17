<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Cliente {
    
    private $id;
    private $nombre;
    private $estado;
    private $fecharegistro;
    private $idrol;
        
    function __construct() {}
function getId() {
    return $this->id;
}

function getNombre() {
    return $this->nombre;
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

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}
function getIdrol() {
    return $this->idrol;
}

function setIdrol($idrol) {
    $this->idrol = $idrol;
}


//------------------------------------------------------------------------------
   

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM cliente_listar()";
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
        function listar_por_rol($idrol){
       
        $con = Conectar();
        $sql = "SELECT * FROM clientes_por_rol($idrol)";
//        var_dump($sql);
//        exit();
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
    
      function grabar(Cliente $c){
        $con =  Conectar();
        $sql = "SELECT * FROM cliente_insertar('$c->nombre')";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_cliente']="El cliente ingresado ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_cliente']="Los datos se registraron satisfactoriamente"; 
            return 1;
        }
}   
   function actualizar(Cliente $c){
        $con =  Conectar();
        $sql = "SELECT * FROM cliente_editar('$c->nombre',$c->id)";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_cliente']="El cliente ingresado ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_cliente']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
}  
 function buscarPorId(Cliente $c){
        $con = Conectar();
        $sql = "SELECT * FROM cliente_buscar_por_id($c->id)";
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
                $_SESSION['cliente_idcliente'] = $a['cliente_idcliente'] ;
                $_SESSION['cliente_nombre'] = $a['cliente_nombre'];
                $_SESSION['cliente_estado'] = $a['cliente_estado'];
                $_SESSION['cliente_fecharegistro'] = $a['cliente_fecharegistro'];
                $_SESSION['accion_cliente'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
            function buscar(Cliente $c)
    {
         $con = Conectar();
         $sql = "SELECT * FROM cliente_buscar('%$c->nombre%','$c->estado','$c->fecharegistro')";
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
      function anular(Cliente $c){
        $con = Conectar();
        $sql = "SELECT * FROM cliente_anular('$c->estado',$c->id)";  
        pg_query($con,$sql); 
    } 
    }