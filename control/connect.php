<?php

//Arquivo de conexão com o banco de dado
//mysql_connect
//mysqli_connect

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_site_php";

$link = mysqli_connect($host, $user, $pass, $db);


//Para testar se a conexão esta ok
/*
$banco = mysqli_connect_errno();
if($banco == TRUE){
    echo "Erro na conexão";
}else{
    echo "Conexão Ok!";
}
 * 
 * 
 */

?>