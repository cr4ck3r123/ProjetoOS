<?php

include 'connect.php';
//include '../js/script.js';
include '../view/TelaLogin.php';

$login = $_POST['usuario'];
$senha = $_POST['password'];

$sql = mysqli_query($link, "select * from tb_user where email='$login'");

while ($line = mysqli_fetch_array($sql)) {
    $login_user = $line['email'];
    $senha_user = $line['senha'];
}

if ($login == $login_user && $senha == $senha_user) {

    SESSION_START();
    $_SESSION['usuario'] = $login_user;
    $_SESSION['password'] = $senha;    

    header('location:../view/TelaAdmin.php');
}else {    

    echo "<script type=text/javascript> 
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'E-mail ou Senha incorretos!',                       
                    }); 
                    </script>";    
   
    //header('location:../view/TelaLogin.php');
}

