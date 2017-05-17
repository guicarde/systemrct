<?php

$user = 'postgres';
$pass = '123456';
$db_name = '';
$port = 5432;
$host = 'localhost';

$str = "host=$host port=$port dbname=$db_name user=$user password=$pass";
//
//var_dump($str);
//exit();
function Conectar()
{
    $con = pg_connect("host=localhost port=5432 dbname=rct user=postgres password=123456") or die("error");
    return $con;
}

